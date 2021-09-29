// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Secondary Cardinal Vowels";
mincorrect=13;
minrun=3;
var namebase="sounds/cardinal/";
var n = 10;

for (var i=0; i<n; i++) {
    token = i+9;
    soundfiles[i]=namebase+"c"+token.toString();    answer[i]=token.toString();
    soundfiles[i+n]=namebase+"dj"+token.toString();    answer[i+n]=token.toString();
}







