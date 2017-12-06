function radioClickURL() {
  document.getElementById("textInputDiv").innerHTML = '';
  document.getElementById("textInputDiv").innerHTML = '<input type="url" name="URL">';
  document.getElementById("hiddenInput").innerHTML = '<input type="hidden" name="inputType" id="inputType" value="URL">';
}
function radioClickText() {
  document.getElementById("textInputDiv").innerHTML = '';
  document.getElementById("textInputDiv").innerHTML = '<textarea rows="4" cols="50" name="text"></textarea>';
  document.getElementById("inputTypeDiv").innerHTML = '<input type="hidden" name="inputType" id="inputType" value="text">';
}
function radioClickEnc() {
  document.getElementById("isCSVDiv").innerHTML = '';
  document.getElementById("encOrDecHidden").innerHTML = "<input type='hidden' name='encOrDec' id='encOrDec' value='enc'>";
}
function radioClickDec() {
  document.getElementById("isCSVDiv").innerHTML = "<input type='checkbox' name='isCSV' value='isCSV'> Display CSV as table?<br><br>";
  document.getElementById("encOrDecHidden").innerHTML = "<input type='hidden' name='encOrDec' id='encOrDec' value='dec'>"
}