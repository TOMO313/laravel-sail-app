function follow(user){
   $.ajax({
       headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
       url: `/follow/${user}`,
       type: "POST",
   })
   .done((data)=>{
       console.log(data);
       $("#follower").text(data.name + "をフォローしました！");
   })
   .fail((data)=>{
       console.log(data);
   });
}

function destroy(user){
    $.ajax({
        headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")},
        url: `/destroy/${user}`,
        type: "POST",
    })
    .done((data)=>{
        console.log(data);
        $("#follower").text(data.name + "をフォロー解除しました！");
    })
    .fail((data)=>{
        console.log(data);
    });
 }