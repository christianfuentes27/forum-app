const postContainer = document.getElementById('post-container');

postContainer.addEventListener('click', (e) => {
   if(e.target.classList.contains('comments-btn')) {
       let commentBtn = e.target.getAttribute('key');
       let comments = document.querySelector(`[key='comment-${commentBtn}']`);
       
       if(comments.style.display == "none") comments.style.display = "block";
       else comments.style.display = "none";
   }
});