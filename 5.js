function createMatrix(ordo) {
    var matrix = new Array(ordo).fill(0).map(() => new Array(ordo).fill(0));
    var crossA = 0;
    var crossB = 0;

    for(var i=0; i < ordo; i++) {
        for(var a=0; a < ordo; a++) {
            matrix[i][a] = Math.floor(Math.random() * 99)+1;

            if(i == a) {
                crossA+=matrix[i][a];
            }

            if(i+a == (ordo-1)) {
                crossB+=matrix[i][a];
            }
        }
    }

    console.log(matrix);
    console.log("Total : ", crossA+crossB);
}

//example
createMatrix(3);
