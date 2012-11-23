#!/usr/bin/env ruby

require "json"
require "fileutils"
require "trollop"

opts = Trollop::options do
    opt :uninstall, "Uninstall old installation"
end

INSTALLED_FILE = ".installed_files.json"
DESTINATION_DIR = "/usr/local/share/antlr-php"

files_to_be_installed = {
    "lib" => [
        "antlr-3.4-complete.jar",
        "antlr-php.jar"
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

    FileUtils.rmdir DESTINATION_DIR
    FileUtils.rm INSTALLED_FILE
end

# if uninstall was required, stop here ...

if opts[:uninstall] == true
    exit 0
end

installed_files = []

FileUtils.mkdir_p DESTINATION_DIR
lib_files = files_to_be_installed["lib"]

lib_files.each do |file|
    FileUtils.cp "lib/#{file}", DESTINATION_DIR
    installed_files << "#{DESTINATION_DIR}/#{file}"
end

content = JSON.pretty_generate installed_files

File.open INSTALLED_FILE, "w" do |file|
    file.write content
end
