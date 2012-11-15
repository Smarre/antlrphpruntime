grammar t024finally;

options {
    language=Php;
}

prog returns [events]
@init {\$events = array();}
@after {\$events[] = 'after';}
    :   ID {throw new Exception();}
    ;
    catch [Exception $ex] {\$events[] = 'catch';}
    finally {\$events[] = 'finally';}

ID  :   ('a'..'z')+
    ;

WS  :   (' '|'\n'|'\r')+ {$channel=self::\$HIDDEN;}
    ;
