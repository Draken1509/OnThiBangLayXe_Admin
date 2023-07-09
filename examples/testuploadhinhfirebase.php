<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.8/firebase-storage.js"></script>
   
     <!-- <script src='https://cdn.firebase.com/js/client/8.2.8/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script> -->
   
</head>
<body>
    <label for="">hinh</label>
    <input type="file" id=photo>
    <button onclick="uploadImg()">upload</button>
        <script>       
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
         firebase.initializeApp(firebaseConfig);                       
        </script>
         <script>           
                function uploadImg(){                   
                const file=document.querySelector('#photo').files[0];
                const name=file.name;
                const ref=firebase.storage().ref('CauHoi/'+name);
                const metadata={
                    contentType: file.type
                };                                              
                const upLoadIMG=ref.put(file,metadata);
                upLoadIMG
                .then(snapshot => snapshot.ref.getDownloadURL())
                .then(url=>{console.log(url);
            })
                .catch(console.error)
            }
        </script>
</body>
</html>