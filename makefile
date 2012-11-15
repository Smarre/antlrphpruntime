all: jartool tests

jartool:
	@if [ ! -e antlr.jar ]; then echo "Download latest Antlr release jar file from Antlr.org, then copy it to 'antlr.jar'"; exit 1; fi
	javac -cp antlr.jar tool/src/main/java/org/antlr/codegen/PhpTarget.java
	jar -uf antlr.jar -C tool/src/main/resources/ .
	jar -uf antlr.jar -C tool/src/main/java/ .

tests:
	cd test;\
	 java -jar ../antlr.jar Id.g;\
	 php.exe printids.php
