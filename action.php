<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, and update) operations
 * @author    CodexWorld.com
 * @url        http://www.codexworld.com
 * @license    http://www.codexworld.com/license
 */
class DB{
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "root";
    private $dbName     = "myntralogin";
    private $tblName    = "mobile_numbers";
    
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function checkRow($conditions = array()){
        $sql = 'SELECT * FROM '.$this->tblName;
        if(!empty($conditions)&& is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }

        $result = $this->db->query($sql);
        
        return !empty($result->num_rows > 0)?true:false;
    }
    
    /*
     * Insert data into the database
     * @param string name of the table
     * @param array the data for inserting into the table
     */
    public function insert($data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $columns .= $pre.$key;
                $values  .= $pre."'".$val."'";
                $i++;
            }
            $query = "INSERT INTO ".$this->tblName." (".$columns.") VALUES (".$values.")";
            $insert = $this->db->query($query);
            return $insert?$this->db->insert_id:false;
        }else{
            return false;
        }
    }
    
    /*
     * Update data into the database
     * @param string name of the table
     * @param array the data for updating into the table
     * @param array where condition on updating data
     */
    public function update($data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $query = "UPDATE ".$this->tblName." SET ".$colvalSet.$whereSql;
            $update = $this->db->query($query);
            return $update?$this->db->affected_rows:false;
        }else{
            return false;
        }
    }
}
// <!-- Display status message -->
// <?php echo !empty($statusMsg)?'<p class="'.$statusMsg['status'].'">'.$statusMsg['msg'].'</p>':''; ?>

// <!-- OTP Verification form -->
// <form method="post">
//     <label>Enter Mobile No</label>
//     <input type="text" name="mobile_no" value="<?php echo !empty($recipient_no)?$recipient_no:''; ?>" <?php echo ($otpDisplay == 1)?'readonly':''; ?>/>
    
//     <?php if($otpDisplay == 1){ ?>
//     <label>Enter OTP</label>
//     <input type="text" name="otp_code"/>
//     <a href="javascript:void(0);" class="resend">Resend OTP</a>
//     <?php } ?>
//     <input type="submit" name="<?php echo ($otpDisplay == 1)?'submit_otp':'submit_mobile'; ?>" value="VERIFY"/>
// </form>

<?php
function sendSMS($senderID, $recipient_no, $message){
    // Request parameters array
    $requestParams = array(
        'user' => 'myntralogin',
        'apiKey' => 'dssf645fddfgh565',
        'senderID' => $senderID,
        'recipient_no' => $recipient_no,
        'message' => $message
    );
    
    // Merge API url and parameters
    $apiUrl = "http://api.example.com/http/sendsms?";
    foreach($requestParams as $key => $val){
        $apiUrl .= $key.'='.urlencode($val).'&';
    }
    $apiUrl = rtrim($apiUrl, "&");
    
    // API call
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Return curl response
    return $response;
}

// Load and initialize database class
require_once 'DB.class.php';
$db = new DB();
        
$statusMsg = $receipient_no = '';
$otpDisplay = $verified = 0;

// If mobile number submitted by the user
if(isset($_POST['submit_mobile'])){
    if(!empty($_POST['mobile_no'])){
        // Recipient mobile number
        $recipient_no = $_POST['mobile_no'];
        
        // Generate random verification code
        $rand_no = rand(10000, 99999);
        
        // Check previous entry
        $conditions = array(
            'mobile_number' => $recipient_no,
        );
        $checkPrev = $db->checkRow($conditions);
        
        // Insert or update otp in the database
        if($checkPrev){
            $otpData = array(
                'verification_code' => $rand_no
            );
            $insert = $db->update($otpData, $conditions);
        }else{
            $otpData = array(
                'mobile_number' => $recipient_no,
                'verification_code' => $rand_no,
                'verified' => 0
            );
            $insert = $db->insert($otpData);
        }
        
        if($insert){
            // Send otp to user via SMS
            $message = 'Dear User, OTP for mobile number verification is '.$rand_no.'. Thanks Myntra';
            $send = sendSMS('CODEXW', $recipient_no, $message);
            
            if($send){
                $otpDisplay = 1;
            }else{
                $statusMsg = array(
                    'status' => 'error',
                    'msg' => "We're facing some issue on sending SMS, please try again."
                );
            }
        }else{
            $statusMsg = array(
                'status' => 'error',
                'msg' => 'Some problem occurred, please try again.'
            );
        }
    }else{
        $statusMsg = array(
            'status' => 'error',
            'msg' => 'Please enter your mobile number.'
        );
    }
    
// If verification code submitted by the user
}elseif(isset($_POST['submit_otp']) && !empty($_POST['otp_code'])){
    $otpDisplay = 1;
    $recipient_no = $_POST['mobile_no'];
    if(!empty($_POST['otp_code'])){
        $otp_code = $_POST['otp_code'];
        
        // Verify otp code
        $conditions = array(
            'mobile_number' => $recipient_no,
            'verification_code' => $otp_code
        );
        $check = $db->checkRow($conditions);
        
        if($check){
            $otpData = array(
                'verified' => 1
            );
            $update = $db->update($otpData, $conditions);
            
            $statusMsg = array(
                'status' => 'success',
                'msg' => 'Thank you! Your phone number has been verified.'
            );
            
            $verified = 1;
        }else{
            $statusMsg = array(
                'status' => 'error',
                'msg' => 'Verification code incorrect, please try again.'
            );
        }
    }else{
        $statusMsg = array(
            'status' => 'error',
            'msg' => 'Please enter the verification code.'
        );
    }
}
?>
<!-- Display status message -->
<?php echo !empty($statusMsg)?'<p class="'.$statusMsg['status'].'">'.$statusMsg['msg'].'</p>':''; ?>

<?php if($verified == 1){ ?>
    <p>Mobile No: <?php echo $recipient_no; ?></p>
    <p>Verification Status: <b>Verified</b></p>
<?php } ?>