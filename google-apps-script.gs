const SHEET_NAME = "Sheet1";  // Change to your actual sheet name

function doPost(e) {
  const sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName(SHEET_NAME);
  const data = JSON.parse(e.postData.contents);
  sheet.appendRow([
    new Date(), data.name, data.address, data.id, data.passport
  ]);
  return ContentService
         .createTextOutput(JSON.stringify({ status: "success" }))
         .setMimeType(ContentService.MimeType.JSON);
}
