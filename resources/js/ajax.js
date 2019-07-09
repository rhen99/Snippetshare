import Axios from "axios";
//DOM
//Comment
const commentSubmit = document.getElementById("submitComment");
const updateComment = document.getElementById("updateComment");
const comment = document.getElementById("comment_body");
//Liking
const likeBtn = document.querySelectorAll(".like");
//Listener
if (commentSubmit) {
    commentSubmit.addEventListener("click", postComment);
    function postComment(e) {
        e.preventDefault();
        const commentCon = e.target.parentNode.parentNode.nextElementSibling;
        const postId = parseInt(
            e.target.parentNode.parentNode.dataset["postid"],
        );
        let commentBody = comment.value;
        if (commentBody == "" || postId == undefined || commentUrl == "")
            return;

        Axios.post(commentUrl, {
            postId: postId,
            commentBody: commentBody,
            _token: token,
        })
            .then(res => {
                comment.value = "";
                commentCon.prepend(
                    createComment(userName, commentBody, userImg),
                );
            })
            .catch(err => console.log(err));
    }
}
if (updateComment) {
    updateComment.addEventListener("click", getComment);
    const updatedComment = document.getElementById("updatedBody");
    function getComment(e) {
        e.preventDefault();
        const comment =
            updateComment.parentNode.previousElementSibling.innerHTML;
        updatedComment.value = comment;
    }
}

function createComment(name, body, img) {
    //Create Elements
    const commentDiv = document.createElement("div");
    const userDiv = document.createElement("div");
    const userDetailsDiv = document.createElement("div");
    const avatarDiv = document.createElement("div");
    const avatarImg = document.createElement("img");
    const userNameDiv = document.createElement("div");
    const userName = document.createElement("a");
    const manageComments = document.createElement("a");
    const settings = document.createElement("i");
    const bodyDiv = document.createElement("div");
    const actionDiv = document.createElement("div");
    const hr = document.createElement("hr");
    //Add Attrs
    commentDiv.classList.add("comment");
    userDiv.classList.add("user");
    userDetailsDiv.classList.add("user-details");
    bodyDiv.classList.add("comment_body");
    actionDiv.classList.add("comment_action");
    avatarDiv.classList.add("avatar");
    userNameDiv.classList.add("user-name");
    avatarImg.src = img;
    manageComments.classList.add("btn");
    manageComments.classList.add("blue");
    manageComments.href = manageCommentsUrl;
    settings.classList.add("material-icons");
    //Appends
    userName.append(name);
    bodyDiv.append(body);
    avatarDiv.append(avatarImg);
    settings.append("settings");
    manageComments.append(settings);
    //Piecing it Together
    userNameDiv.append(userName);
    userDetailsDiv.prepend(avatarDiv);
    userDetailsDiv.append(userNameDiv);
    userDiv.append(userDetailsDiv);
    actionDiv.append(manageComments);
    commentDiv.append(userDiv);
    commentDiv.append(bodyDiv);
    commentDiv.append(actionDiv);
    commentDiv.append(hr);
    return commentDiv;
}

function postLike(btn, e) {
    e.preventDefault();
    const postId = parseInt(btn.parentNode.parentNode.dataset["postid"]);
    const isLike = true;
    const output = btn.nextElementSibling;
    const likes = parseInt(btn.nextElementSibling.innerHTML);

    Axios.post(likeUrl, {
        postId: postId,
        isLike: isLike,
        _token: token,
    })
        .then(res => {
            if (btn.childNodes[0].innerHTML == "thumb_up") {
                btn.childNodes[0].innerHTML = "thumb_down";
                btn.classList.remove("blue");
                btn.classList.add("red");
                output.innerHTML = likes + 1;
            } else {
                btn.childNodes[0].innerHTML = "thumb_up";
                btn.classList.remove("red");
                btn.classList.add("blue");
                output.innerHTML = likes - 1;
            }
        })
        .catch(err => console.log(err));
}

if (likeBtn) {
    likeBtn.forEach(btn =>
        btn.addEventListener("click", function(e) {
            postLike(btn, e);
        }),
    );
}
