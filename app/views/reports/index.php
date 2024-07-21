
<?php 
    if (!(($_SESSION['username']) == "Admin")) {
    header('Location: /home');
    }
?>
<?php require_once 'app/views/templates/header.php' ?>
<nav aria-label="breadcrumb"  class="breadcrumb-nav" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">reminders</li>
  </ol>
</nav>
<?php 
    if (!(($_SESSION['username']) == "Admin")) {
    header('Location: /home');
    }
?>
<div class="container">
    <div >
        <div class="row">
            <div class="col-lg-12">
                <h1>Reports</h1>
           
<style>
    
    body {
      --color: rgba(30, 30, 30);
      

      display: grid;
      align-content: center;
      gap: 2rem;

      font-family: "Poppins", sans-serif;
      color: var(--color);
      background: var(--bgColor);
    }

    h1 {
      text-align: center;
    }
            .progress-container {
                    width: 300px; /* Control the width of the progress bar */
                    height: 20px; /* Control the height of the progress bar */
                    padding: 3px; /* Padding around the progress bar */
                    background-color: #eee; /* Light grey background */
                    border-radius: 10px; /* Rounded corners for the container */
                    box-shadow: 0 2px 4px rgba(0,0,0,0.2); /* Subtle shadow for depth */
                }

                /* Default progress bar styling */
                progress {
                    width: 100%; /* Fill the width of its container */
                    height: 100%; /* Fill the height of its container */
                    -webkit-appearance: none; /* Important for Webkit browsers */
                    appearance: none; /* Removes default appearance */
                }

                /* Customizable background for the progress bar */
                progress::-webkit-progress-bar {
                    background-color: #ddd; /* Darker grey as the base of the bar */
                    border-radius: 8px; /* Rounded corners */
                }

                /* Stylish gradient fill for the progress value */
                progress::-webkit-progress-value {
                    background: linear-gradient(to right, #4caf50, #81c784); /* Green gradient */
                    border-radius: 8px; /* Rounded corners */
                }

                /* For Firefox */
                progress::-moz-progress-bar {
                    background: linear-gradient(to right, #4caf50, #81c784); /* Green gradient */
                    border-radius: 8px; /* Rounded corners */
                }
           
            
            table {
                background-color: #fff;
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
        </style>
        <table>
            <thead>
                <tr>
                    <th>username </th>
                    <th>Subject</th>
                    <th>date</th>
                    
                </tr>
            </thead>
              <?php
                foreach ($data['reminders'] as $reminder) {
                    echo "<tbody><tr> <td>" .$reminder['username']. "</td> <td>".  $reminder['subject'] . " </td><td>" .$reminder['created_at']. "</td></tr>";
                    
                    


                    
                }

                echo "</tbody> </table>";
            //print_r($data['most']) ;
            // echo " the id of the user with the most reminders is ".$data['most'][0]['user_id']; 
                ?><br>
            <?php
            //echo $data['most'][0]['user_id'];
                ?>
             <!-- <progress value="<?php //echo $data['most'][0]['reminder_count'];?>" max="<?php //echo $data['most'][0]['reminder_count'];?>"></progress> -->
            <h2>the person with the most reminders is <?php echo$data['most'][0]['username'] ;?> .</h2>
            <h2>He has <?php echo$data['most'][0]['reminder_count'] ;?> reminder(s) .</h2>
            <?php  //print_r($data['most1']);?>
            <?php foreach ($data['most1'] as $Allreminder){
                echo"<br>".$Allreminder['username']." has ".$Allreminder['reminder_count']." reminders";
                    ?>
                    <div class="progress-container">
                <progress value="<?php echo $Allreminder['reminder_count'];?>" max="<?php echo $data['most'][0]['reminder_count'];?>"></progress></div>
           <?php } ?>   
            <!-- <?php //print_r($data['most2']);?> -->
            <div class="line-chart">
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <canvas id="loginAttemptsChart" width="600" height="400"></canvas>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Embed PHP data into JavaScript
                        const data = <?php echo json_encode($data['most2']); ?>;

                        const labels = data.map(user => user.username);
                        const goodAttempts = data.map(user => user.GoodAttempts);
                        const badAttempts = data.map(user => user.BadAttempts);

                        const ctx = document.getElementById('loginAttemptsChart').getContext('2d');
                        const loginAttemptsChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Good Attempts',
                                        data: goodAttempts,
                                        borderColor: 'blue',
                                        fill: false
                                    },
                                    {
                                        label: 'Bad Attempts',
                                        data: badAttempts,
                                        borderColor: 'red',
                                        fill: false
                                    }
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>



            
            </div>
        </div>
    </div>
</div>
            
<?php require_once 'app/views/templates/footer.php'?>
