import moment from "moment";
import numeral from "numeral";

//Date Formatting
const commentDate = document.querySelectorAll(".comment-date");

window.addEventListener("DOMContentLoaded", formatCommentDate);
function formatCommentDate(date) {
    const formatted = moment(date, "YYYYMMDD h:mm:ss:a").fromNow();
    return formatted;
}
commentDate.forEach(date => {
    date.innerHTML = formatCommentDate(date.innerHTML);
});
const fileInp = document.getElementById("profile");
const preview = document.getElementById("preview");
function previewFile() {
    const file = fileInp.files[0];
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        preview.src = reader.result;
    });
    if (file) {
        reader.readAsDataURL(file);
    }
}
if (fileInp) {
    fileInp.addEventListener("change", previewFile);
}
window.addEventListener("DOMContentLoaded", formatLikes);

function formatLikes(likes) {
    return numeral(likes).format("0a");
}
const likes = document.querySelectorAll(".likes");

likes.forEach(like => (like.innerHTML = formatLikes(like.innerHTML)));
