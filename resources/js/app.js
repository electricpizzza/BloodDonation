/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

let city;
$(this).ready(function () {
  $("input[type='number']").inputSpinner();
  navigator.geolocation;
  navigator.geolocation.getCurrentPosition(loc=>{
    const long=loc.coords.longitude;
    const lati=loc.coords.latitude;
    const apiKey = `0244cef8afc840`
      fetch(`https://us1.locationiq.com/v1/reverse.php?key=${apiKey}&lat=${lati}&lon=${long}&format=json`).then(resp=>resp.json()).then(data=>{
          city = data.address.city;
      }).catch(err=>console.error(err.code));
  });
  
});
function validat(form){
  $(form).append(` <input style="display:none" id="locaton" type="text" class="form-control" value="${city}" name="city">`);
  return true;
}

$(selector).click(function (e) { 
  e.preventDefault();
  const message = $("#message").val();
  const conversation;
  const user;
  $.ajax({
    type: "post",
    url: `/send/${conversation}/${user}/${message}`,
    success: function (response) {
      
    }
  });
});
