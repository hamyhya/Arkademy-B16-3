function divideAndShort(number) {
    var tempArr = [];
    var numArr = number.toString().split('');
    var sumNum = '';

    for(i=0; i<numArr.length; i++) {
        if(numArr[i] == 0) {
            tempArr.sort((a,b) => a-b);
            sumNum += tempArr.join('');
            tempArr = [];
        }else if(i == (numArr.length-1)) {
            if(numArr[i] !== 0) {
                tempArr[i] = numArr[i];
            }

            tempArr.sort((a,b) => a-b);
            sumNum += tempArr.join('');
            tempArr = [];
        }else {
            tempArr[i] = numArr[i];
        }
    }
    
    console.log(sumNum);
}

divideAndShort(5956560159466056);
divideAndShort(3634640298273799);