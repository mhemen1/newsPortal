    $(function() {
        $("form[name='registracija']").validate({
         
          rules: {
            username: {
              required: true,
                maxlength: 32,
                minlength:4,           
          },
          ime: {
              required: true,
              maxlength: 30,
              minlength:2,
             
             
            },
            prezime:{
              required: true,
              maxlength: 30,
              minlength:2,
            },
            lozinka:{
                required:true,
                minlength:7,
                maxlength:20
                
            } ,
            lozinka2:{
              required:true,
              equalTo : "#lozinka"
            }
          },
          // Specify validation error messages
          messages: {
            username: {
              required: "Korisničko ime ne smije biti prazno",
              maxlength: "Korisničko ime smije imati do 32 znakova",
              minlength: "Korisničko ime mora imati barem 4 znaka",
            },
            ime: {
              required: "Ime ne smije biti prazno",
              maxlength: "Ime smije imati do 30 znakova",
              minlength: "Ime mora imati barem 2 znaka",
             
            },
            prezime:{
              required: "Prezime ne smije biti prazno",
              maxlength: "Prezime smije imati do 30 znakova",
              minlength: "Prezime mora imati barem 2 znaka",              
            },
            lozinka:{
                required: "Lozinka ne smije biti prazna",
                minlength: "Lozinka mora imati barem 7 znakova",
                maxlength: "Lozinka ne smije biti duža od 20 znakova."
                
            },
            lozinka2:{
              required: "Ponovljena lozinka ne smije biti prazna.",
              equalTo : "Lozinke moraju biti iste."
            }

   
         },
   
         
          submitHandler: function(form) {
            form.submit();
          }
        });
      });

  