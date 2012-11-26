#!/usr/bin/env ruby

require "json"
require "fileutils"
require "trollop"

opts = Trollop::options do
    opt :uninstall, "Uninstall old installation"
end

INSTALLED_FILE = ".installed_files.json"
D_SHARE_DIR = "/usr/local/share/antlr-php"
D_BIN_DIR = "/usr/local/bin"

files_to_be_installed = {
    "lib" => [
        "antlr-3.4-complete.jar",
        "antlr-php.jar"
    ],
    "bin" => [
        "gen-antlr-php.rb"
    ]
}

if File.exists? INSTALLED_FILE
    installed_files = JSON.load File.new(INSTALLED_FILE)
end

# uninstall old files

unless installed_files.nil?
    installed_files.each do |file|
        FileUtils.rm file
    end

    FileUtils.rmdir D_SHARE_DIR
    FileUtils.rmdir D_BIN_DIR
    FileUtils.rm INSTALLED_FILE
end

# if uninstall was required, stop here ...

if opts[:uninstall] == true
    exit 0
end

installed_files = []

FileUtils.mkdir_p D_SHARE_DIR
lib_files = files_to_be_installed["lib"]
bin_files = files_to_be_installed["bin"]

lib_files.each do |file|
    FileUtils.cp "lib/#{file}", D_SHARE_DIR
    installed_files << "#{D_SHARE_DIR}/#{file}"
end

bin_files.each do |file|
    FileUtils.cp file, D_BIN_DIR

    fullfile = "#{D_BIN_DIR}/#{file}"
    basename = "#{D_BIN_DIR}/#{File.basename(file, File.extname(file))}"

    File.chmod 0755, fullfile
    FileUtils.ln_s fullfile, basename

    installed_files << fullfile
    installed_files << basename
end

content = JSON.pretty_generate installed_files

File.open INSTALLED_FILE, "w" do |file|
    file.write content
end
