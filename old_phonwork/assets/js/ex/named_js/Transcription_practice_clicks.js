// must assume the existence of some variables (defined in exercises.js)

exerciseName = "Transcribing Zulu clicks";
mincorrect=12;
minrun=3;
var n=12;
debug=1;

var namebase="media/sounds/zulu/z"; // files are lg/lg1.wav, etc

for (var i=0; i<n; i++) {
    token = i+21;
    soundfiles[i] = namebase+token.toString();
}
answer[0] = "k͡|";
answer[1] = "k͡ǃ";
answer[2] = "k͡‖";
answer[3] = "k͡|ʰ";
answer[4] = "k͡ǃʰ";
answer[5] = "k͡‖ʰ";
answer[6] = "ɡ͡|";
answer[7] = "ɡ͡ǃ";
answer[8] = "ɡ͡‖";
answer[9] = "ŋ͡|";
answer[10] = "ŋ͡ǃ";
answer[11] = "ŋ͡‖";






