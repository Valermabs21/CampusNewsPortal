<?php

// Fetch post data (assuming $ROW is already fetched and contains the post data)
$post_id = $ROW['postid'];

// Correct the SQL query to refer to the proper table and columns
$stmt = $con->prepare("SELECT ca_comments.comment, ca_comments.date, users.username 
                        FROM ca_comments 
                        JOIN users ON ca_comments.user_id = users.userid 
                        WHERE ca_comments.post_id = ? 
                        ORDER BY ca_comments.date ASC");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$result = $stmt->get_result();

$comments = [];
while ($row = $result->fetch_assoc()) {
    $comments[] = $row;
}
$stmt->close();

// Fetch the comment count separately
$stmt_count = $con->prepare("SELECT COUNT(*) as comment_count FROM ca_comments WHERE post_id = ?");
$stmt_count->bind_param("i", $post_id);
$stmt_count->execute();
$stmt_count->bind_result($comment_count);
$stmt_count->fetch();
$stmt_count->close();

?>

<div id="post">
    <div>
        <div style="font-weight: bold; color: #405d9b; font-size: 20px;"><?php echo htmlspecialchars($ROW_USER['username']); ?></div>
        <br>

        <div style="font-size: 16px;"><?php echo nl2br(htmlspecialchars($ROW['post'])); ?></div>

        <br><br>

        <?php if (file_exists($ROW['image'])): 
            $post_image = $image_class->get_thumb_post($ROW['image']); ?>
            <img src='<?php echo htmlspecialchars($post_image); ?>' style='width:50%;' />
        <?php endif; ?>

        <br><br>

        <?php $likes = ($ROW['likes'] > 0) ? "(" . $ROW['likes'] . ")" : ""; ?>

        <a href="ca_like.php?type=post&id=<?php echo htmlspecialchars($ROW['postid']); ?>" style="text-decoration: none;">
            <i class="far fa-thumbs-up"></i> Like <?php echo htmlspecialchars($likes); ?>
        </a> . 
        <a href="#type=post&id=<?php echo htmlspecialchars($ROW['postid']); ?>" style="text-decoration: none;">
            <i class="far fa-comment"></i> Comment (<?php echo htmlspecialchars($comment_count); ?>)
        </a> . 
        <a href="javascript:void(0);" onclick="shareOnFacebook('<?php echo htmlspecialchars('http://localhost/campusnewsportal/ca_post.php?id=' . $ROW['postid']); ?>')" style="text-decoration: none;">
            <i class="fa fa-share"></i> Share</a> .
        <span style="color: #999;"><?php echo htmlspecialchars($ROW['date']); ?></span>

        <!-- Comment Section -->
        <div class="comments-section">
            <h3>Comments</h3><br>
            <!-- Display comments -->
            <?php if (!empty($comments)): ?>
                <div class="comments-list">
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <div style="font-weight: bold; color: #405d9b; font-size: 18px;"><?php echo htmlspecialchars($comment['username']); ?></div><br>
                            <div style="font-size: 16px;"><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></div><br>
                            <div style="color: #999;"><?php echo htmlspecialchars($comment['date']); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No comments yet.</p>
            <?php endif; ?>

            <form method="POST" action="ca_comment.php">
                <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($ROW['postid']); ?>">
                <div class="comment-form">
                    <textarea id="comment" name="comment" placeholder="Write a comment..." required></textarea>
                    <button type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
