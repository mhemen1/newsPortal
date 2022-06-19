$(document).ready(function() {
    $("form[name='Unos']").each(function() {
        $(this).validate({
            rules: {
                articleTitle: {
                  required: true,
                    maxlength: 30,
                    minlength:5,           
              },
              articleSummary: {
                  required: true,
                  maxlength: 100,
                  minlength:10,
                 
                 
                },
                articleFull:{
                  required: true,
                },
                articleCat:{
                    required:true,
                    
                },
                articleFig:{
                    required:true,
                    accept: "image/*"
                },
              },
              // Specify validation error messages
              messages: {
                articleTitle: {
                  required: "Naslov ne smije biti prazan",
                  maxlength: "Naslov vijesti mora imati 5 do 30 znakova",
                  minlength: "Naslov vijesti mora imati 5 do 30 znakova",
                },
                articleSummary: {
                  required: "Kratki sadržaj ne smije biti prazan",
                  maxlength: "Kratki sadržaj vijesti mora imati 10 do 100 znakova ",
                  minlength: "Kratki sadržaj vijesti mora imati 10 do 100 znakova"
                 
                },
                articleFull:{
                    required: "Tekst vijesti ne smije biti prazan",                
                },
                articleCat:{
                    required: "Kategorija mora biti izabrana",
                },
                articleFig: {
                    required: "Slika mora biti izabrana ",
                    accept: "Samo slike se mogu odabrati."
                },
       
             },
       
             
              submitHandler: function(form) {
                form.submit();
              }
            })});
          });