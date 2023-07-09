var firebaseConfig = {                        
    apiKey: "AIzaSyBU-1JhiM8KXXwc6T-9zq5uceCT6Kb8T-E",
    authDomain: "thitracnghiembanglayxemain.firebaseapp.com",
    databaseURL: "https://thitracnghiembanglayxemain-default-rtdb.firebaseio.com",
    projectId: "thitracnghiembanglayxemain",
    storageBucket: "thitracnghiembanglayxemain.appspot.com",
    messagingSenderId: "998052665571",
    appId: "1:998052665571:web:0bdf2b00895fc5de770dd6",
    measurementId: "G-M0MBG8BQ4F"
};
       
    function uploadImg(){                   
        const file=document.querySelector('#photo').files[0];
        const name=file.name;
        const ref=firebase.storage().ref('CauHoi/'+name);
        const metadata={
            contentType: file.type
        };                                              
        const upLoadIMG=ref.child(name).put(file,metadata);
        upLoadIMG
        .then(snapshot => snapshot.ref.getDownloadURL())
        .then(url=>{console.log(url);
    })
        .catch(console.error)
    }
