
function onApiLoad() {
	gapi.load('auth', {'callback':onAuthApiLoad});
	gapi.load('picker');
}

function onAuthApiLoad() {
	window.gapi.auth.authorize({
		'client_id': '1037261576446-f915ecdv9ffd27ilrik1fk1n3dqagv62.apps.googleusercontent.com',
		'scope': ['https://www.googleapis.com/auth/drive']
	}, handleAuthResult);
}
var oauthToken;
function handleAuthResult(authResult) {
	if (authResult && !authResult.error) {
		oauthToken = authResult.access_token;
		createPicker();
	}
}

function createPicker(){
	var picker = new google.picker.PickerBuilder()
		.addView(new google.picker.DocsUploadView())
		.setOAuthToken(oauthToken)
		.setDeveloperKey('AIzaSyB3tvrtGf2DSPqhr2EkzmX4o6_DZDQCyNs')
		.build();
	picker.setVisible(true);
}


function print(){
      var prtContent = document.getElementById("mainDiv");
      var WinPrint = window.open('','', 'left=0, top=0, width=800, height=900, toolbar=0, scrollbars=0, status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }