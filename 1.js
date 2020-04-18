function MyBio(name, age) {
    MyList = {
        name : name,
        age : age,
        adress : 'Dusun Kedalon Desa Kedalon RT 4 RW 6 Kecamatan Kalikajar Kabupaten Wonosobo Provinsi Jawa Tengah',
        hobbies : [
            'Playing Game',
            'Playing Football',
            'Watching Movie',
            'Playing Drum'
        ],
        is_married : false,
        list_school : [{
            name : 'TK Aisyiyah Bustanul Athfal Kalikajar',
            year_in : 2006,
            year_out : 2008,
            major : null
        },
        {
            name : 'SD Negeri 1 Kalikajar',
            year_in : 2008,
            year_out : 2014,
            major : null
        },
        {
            name : 'SMP Negeri 1 Kalikajar',
            year_in : 2014,
            year_out : 2017,
            major : null
        },
        {
            name : 'SMK Negeri 1 Wonosobo',
            year_in : 2017,
            year_out : 2020,
            major : 'Software Engineering'
        }],
        skills : [{
            name : 'Fullstack Web Developer',
            level : 'Beginner'
        },
        {
            name : 'Project Manager',
            level : 'Amateur'
        },
        {
            name : 'Desktop Application Developer',
            level : 'Amateur'
        }],
        interest_in_coding : true


    }
    return MyList;
}

console.log(MyBio('Ilham Bagas Saputra', 18));