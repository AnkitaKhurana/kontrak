
                    <li>
                        <label for="notice-datepicker">Notice Date</label>
                        <input type="text" name="notice_date" id="notice-datepicker">
                    </li>
                    <li>
                        <label for="notice_description">Notice Description</label>
                        <textarea rows="6" name="notice_description" id="notice_description" placeholder="Enter Notice description here"></textarea>
                    </li>
                    <?php
                    	$noticeDateArray = explode('/', $_POST['notice_date']);
        $notice_date = $noticeDateArray[2].'-'.$noticeDateArray[0].'-'.$noticeDateArray[1];
        $notice_description = mysqli_real_escape_string($conn,$_POST['notice_description']);
                      ?>