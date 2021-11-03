// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Say the Primary Cardinal Vowels";
mincorrect=13;
minrun=3;
var namebase="sounds/cardinal/";
var n = 8;

for (var i=0; i<n; i++) {
    token = i+1;

    soundfiles2[i]=namebase+"jones1_"+token.toString();    answer[i]="yes";  quest[i]=token.toString();
    soundfiles2[i+n]=namebase+"jones2_"+token.toString();    answer[i+n]="yes"; quest[i+n] = token.toString();
    soundfiles2[i+n]=namebase+"Jones3_"+token.toString();    answer[i+n]="yes"; quest[i+n] = token.toString();
}







