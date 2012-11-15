rem ( /*
@echo off
cscript /nologo /e:javascript %0
goto end
*/ )

//
// main function is below

function rem() {
	WScript.StdOut.WriteLine("Removing generated test parsers and lexers");

	var files = GetFolderFiles(GetTestPath() + "\\test");

	var fso = new ActiveXObject("Scripting.FileSystemObject");
	for (i in files)
	{		
		if ((!MatchTest(files[i].Name)) && 
		(MatchExt(files[i].Name,"php") || 
		MatchExt(files[i].Name,"tokens") )) {
			var removeme = fso.GetFile(files[i].Path);		
			WScript.StdOut.WriteLine("Deleteing "+files[i].Name);
			removeme.Delete();					
		}
	}
}

function GetFolderFiles(path)
{
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	var folder = fso.GetFolder(path);
	var fc = new Enumerator(folder.files);
	var result = new Array();
	for (; !fc.atEnd(); fc.moveNext())
	{
	        result.push(fc.item());
	}
	return result;
}

function GetTestPath()
{
  var name = WScript.ScriptFullName;
  return name.substr(0,name.lastIndexOf("\\"));
}

function MatchExt(fname,ext) {
  var re = new RegExp("\."+ext+"$");
  var m = re.exec(fname);
  return (m != null);
}

function MatchTest(fname) {
  var re = new RegExp("Test\.php$");
  var m = re.exec(fname);
  return (m != null);
}


/*
:end */

