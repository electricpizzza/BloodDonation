fetch('/planningdates').then(resp=>resp.json()).then(data=>{
  const latestDonation = new Date(data.latestDonation);
  const now = new Date();

  var events = [
    {'Date': new Date(latestDonation.getFullYear(),latestDonation.getMonth(),latestDonation.getDate()), 'Title': 'Mon Dernier Don.'},
    {'Date': new Date(latestDonation.getFullYear(), Number(latestDonation.getMonth()+data.timePeriod), latestDonation.getDate()),
     'Title': 'Mon Prochain don!', 'Link': '/home'},
    {'Date': new Date(now.getFullYear(), 5, 14), 'Title': 'Journée Mondiale des donneurs de sang.', 'Link': 'https://www.google.com/search?client=safari&rls=en&q=journ%C3%A9e+internationale+de+don+du+sang&ie=UTF-8&oe=UTF-8'},
  ];
  var settings = {};
  var element = document.getElementById('caleandar');
  caleandar(element, events, settings);

  const nextDonation =  new Date(latestDonation.getFullYear(), Number(latestDonation.getMonth()+data.timePeriod), latestDonation.getDate());
  moment.locale('Fr');
  $("#nextDonation").html(moment(nextDonation).fromNow());
});
