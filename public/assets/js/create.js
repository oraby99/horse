// $(document).ready(function() {
//     $("input[class='touchspin']").TouchSpin();

//     // Store From Api
//     $("#ads_form").submit(function(e){
//         $(".btn_done").html('<i class="fa fa-spinner fa-spin"></i> Process...').prop('disabled', true);
//         e.preventDefault();

//         Alldata = new FormData(this)
//         console.log(Alldata);
        
//         $.ajax({
//             url:'http://admin.alfuraij.com/api/advertisment/web/store',
//             header:{
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//             },
//             type:'POST',
//             data: new FormData(this),
//             processData:false,
//             contentType:false,
//             success:function(data){

//                 console.log(data);
//                 if(data.status === 200){
//                      $(".btn_done").html('Save').prop('disabled', false);
//                      toastr.success(`${data.message}`);
//                 }
                
                
//                 // }else{
//                 //     // console.log(data);
//                 //     $(".submit-button").html('Save').prop('disabled', false);
//                 //     toastr.error(`${data.message}`);
//                 // }
                    
//             },
//             error:function(data)
//             {
//                 console.log(data);
//                 $(".btn_done").html('Save').prop('disabled', false);
//                 toastr.error(`${ data.responseJSON.message}`);
//                 if(data.status == 403){
//                     // printErrorMsg(data.responseJSON.errors)
//                     msg = data.responseJSON.data
//                     console.log(msg);
//                     // $.each(msg,function(key,value){
//                     //     $(`.${key}_err`).text(value)
//                     //     notyf.open({
//                     //             type: 'error',
//                     //             message: value
                        
//                     //         });
//                     // })
//                 }
              
                
//             }
          
//         });
//     });
//   })

// document.querySelector('#ads_form').addEventListener('submit',function(event){
//     event.preventDefault();
//     const formData = new FormData(event.target)
//     fetch('http://admin.alfuraij.com/api/advertisment/web/store',{
//         method:'POST',
//         body:formData
//     }).then(response => {
//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
//     .then(data => {
//         if (data.status === 200) {
//             // Handle success here
//             toastr.success(data.message);
//         } else {
//             // Handle other response status codes here
//             toastr.error(data.message);
//         }
//     })
//     .catch(error => {
//         console.log(error);
//         if (error.response.data.status === 403) {
//             // Handle 403 status code as validation errors
//             error.response.data.data.json().then(validationErrors => {
//                 for (const field in validationErrors.data) {
//                     if (validationErrors.data.hasOwnProperty(field)) {
//                         const errors = validationErrors.data[field];
//                         errors.forEach(errorMsg => {
//                             toastr.error(`${field}: ${errorMsg}`);
//                         });
//                     }
//                 }
//             });
//         } else {
//             // Handle other types of errors
//             console.error('Error:', error);
//             toastr.error('An error occurred while submitting the form.');
//         }
//     });
// })

const form = document.getElementById('ads_form');

form.addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData(form);

    fetch('https://admin.alfuraij.com/api/advertisment/web/store', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        if (data.status === 200) {
            // Handle success here
            // document.querySelector(".btn_done").innerHTML = 'Save';
            // document.querySelector(".btn_done").removeAttribute('disabled');
            toastr.success(data.message);
        } else {
            // Handle other response status codes here
            // document.querySelector(".btn_done").innerHTML = 'Save';
            // document.querySelector(".btn_done").removeAttribute('disabled');
            toastr.error(data.message);

            // if(data.status === 403)
            // {
            //     validation = data.responseJSON.data
            //     console.log(validation);
            //     validation.forEach(element => {
            //         toastr.error(`${element}`);
            //     });
            // }else{
            //     toastr.error(data.message);
            // }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // document.querySelector(".btn_done").innerHTML = 'Save';
        // document.querySelector(".btn_done").removeAttribute('disabled');
        toastr.error('An error occurred while submitting the form.');

        if (error.response && error.response.status === 403) {
            // Handle 403 status code as validation errors
            error.response.json().then(responseJSON => {
                const msg = responseJSON.data;
                console.log(msg);
                // Handle validation errors as needed
                // For example, you can loop through msg and display error messages
                // using similar logic as in your jQuery code
            });
        }
    });
});