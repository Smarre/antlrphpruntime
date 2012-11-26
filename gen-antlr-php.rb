#!/usr/bin/env ruby

require "trollop"

# #
# Uses antlr to generate PHP targets
#
# This script is written in Ruby as I don’t really like PHP and I needed the launcher.
# Feel free to contribute a launcher done in some other language.
#

p = Trollop::Parser.new do
    opt :grammar, "Grammar file to process", type: :string
    opt :libdir, "Directory where antlrphpruntime is", type: :string
end

opts = Trollop::with_standard_exception_handling p do
    args = ARGV.clone
    result = p.parse ARGV

    # show help screen
    raise Trollop::HelpNeeded if args.empty?
    raise Trollop::HelpNeeded if result[:grammar].nil?

    result
end

if opts[:libdir].nil?
    LIBDIR = "/usr/local/share/antlr-php/\\*"
else
    LIBDIR = opts[:libdir]
end

grammar = opts[:grammar]

command = "java -cp #{LIBDIR} org.antlr.Tool #{grammar}"
puts "Running \"#{command}\""
puts `#{command}`