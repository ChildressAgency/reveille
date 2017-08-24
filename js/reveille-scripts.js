jQuery(document).ready(function($){

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