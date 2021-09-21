// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Primary Cardinal Vowels";
mincorrect=13;
minrun=3;
var namebase="sounds/cardinal/";
var n = 8;

for (var i=0; i<n; i++) {
    token = i+1;
    soundfiles[i]=namebase+"i"+token.toString();    answer[i]=token.toString();
    soundfiles[i+n]=namebase+"jones1_"+token.toString();    answer[i+n]=token.toString();
    soundfiles[i+n]=namebase+"jones2_"+token.toString();    answer[i+n]=token.toString();
    soundfiles[i+n]=namebase+"Jones3_"+token.toString();    answer[i+n]=token.toString();
}







