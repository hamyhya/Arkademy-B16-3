function createTri(n) {
 
  for(var i=1; i<= n; i++){
    var str = '  '.repeat(n-i);
    var str2 = ' *'.repeat(i*2 -1)
 
    console.log(str + str2 + str);
  }
}

(createTri(5))