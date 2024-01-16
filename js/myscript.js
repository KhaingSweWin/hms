$(document).ready(function(){
    $('.delete').click(function(){
        let message=confirm('Are you sure to delete');
        if(message){
           // let id=$(this).parent('td').attr('id');
            let tbody=$('#tbody');
            let id=$(this).parent('td').attr('id');
            $.ajax({
                url:'delete_doctor.php',
                type:'post',
                data:{id:id},
                success:function(response){
                    if(response=='unsuccess'){
                        alert('You can not delete that row.')
                    }
                    else{
                        id.fadeOut();
                    }

                },
                error:function(){

                }
            })
        }
    })



    $('.delete').click(function(){
        let message=confirm('Are you sure to delete');
        if(message){
           // let id=$(this).parent('td').attr('id');
            let tbody=$('#body');
            let id=$(this).parent('td').attr('id');
            $.ajax({
                url:'delete_patient.php',
                type:'post',
                data:{id:id},
                success:function(response){
                    if(response=='unsuccess'){
                        alert('You can not delete that row.')
                    }
                    else{
                        id.fadeOut();
                    }

                },
                error:function(){

                }
            })
        }
    })
})


// $('.delete').on('click',function(){
//     var id=$(this).closeset('td').attr('id');
//     if(id!= undefined && id!= null){
//         let message=confirm ('Are you sure to delete');
//         if(message){
//             $.ajax({
//                 url:'delete_patient.php',
//                 type:'post',
//                 data:{id:id},
//                 success:function(response){
//                     if(response=='fail'){
//                         alert('You cannot delete data');
//                     }
                    
//                 },
//                 error:function(){

//                 }
//             })
//             $(this).closeset('tr').remove();
//         }
//     }
// })