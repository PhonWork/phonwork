// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Say the Secondary Cardinal Vowels";
mincorrect=13;
minrun=3;
var namebase="media/sounds/cardinal/";
var n = 10;

for (var i=0; i<n; i++) {
    token = i+9;

    soundfiles2[i]=namebase+"c"+token.toString();    answer[i]="yes|y";  quest[i]=token.toString();
    soundfiles2[i+n]=namebase+"dj"+token.toString();    answer[i+n]="yes|y"; quest[i+n] = token.toString();
}







