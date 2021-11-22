    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Likes -->
    <script>
      let likeButton = document.querySelectorAll('#likeButton');
      let likeCount = document.querySelectorAll('#likeCount');

      likeButton.forEach(function(button) {
        button.addEventListener('click', function() {
          let postId = button.dataset.postid;
          let likeCount = document.querySelector('#likeCount' + postId);
          let likes = parseInt(likeCount.innerHTML);

          if (button.classList.contains('liked')) {
            button.classList.remove('liked');
            likeCount.innerHTML = likes - 1;
          } else {
            button.classList.add('liked');
            likeCount.innerHTML = likes + 1;
          }

          fetch('likes.php', {
            method: 'post',
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              'postId': postId
            })
          });
        });
      });
    </script>

  </body>
</html>