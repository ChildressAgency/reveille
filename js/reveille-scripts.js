jQuery(document).ready(function($){

  // radio ad modal
  $('#radioAdModal').on('show.bs.modal', function(e){
    var radioAdOpener = $(e.relatedTarget);
    var radioAd = radioAdOpener.data('radio_ad');

    var modal = $(this);
    modal.find('source').attr('src', radioAd);
  });
  $('#radioAdModal').on('hidden.bs.modal', function(){
    $('#radioAdModal').find('#radioAd>source').removeAttr('src');
  });

  // team member modal
  $('#teamMemberBio').on('show.bs.modal', function(e){
    var teamMember = $(e.relatedTarget);
    var teamMemberName = teamMember.data('team_member_name');
    var teamMemberTitle = teamMember.data('team_member_title');
    var teamMemberImage = teamMember.data('team_member_image');
    var teamMemberBio = teamMember.data('team_member_bio');

    var modal = $(this);
    modal.find('#teamMemberImage').attr('src', teamMemberImage);
    modal.find('#teamMemberImage').attr('alt', teamMemberName);
    modal.find('#teamMemberName').html(teamMemberName);
    modal.find('#teamMemberTitle').html(teamMemberTitle);
    modal.find('.modal-body').html(teamMemberBio);
  });

});