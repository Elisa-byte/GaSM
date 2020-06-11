<?php
class Campanie extends Controller
{
    public function index()
    {
        require("app/config/dbh.inc.php");
        $rowperpage = 4;
        // counting total number of posts
        $allcount_query = "SELECT count(*) as allcount FROM campanii";
        $allcount_result = mysqli_query($conn, $allcount_query);
        $allcount_fetch = mysqli_fetch_array($allcount_result);
        $allcount = $allcount_fetch['allcount'];
        $conn->close();

        $toPass = array($rowperpage, 0);
        $latestCampaigns = $this->model('Campanii', $toPass);

        $this->view('campanie/index', ['allcount' => $allcount, 'campanii' => $latestCampaigns, 'rowperpage' => $rowperpage]);
    }

    public function moreCampaigns()
    {

        require("app/config/dbh.inc.php");
        $row = $_POST['row'];
        $rowperpage = 4;

        $latestCampaigns = $this->model('Campanii', array($rowperpage, $row));
        // selecting posts
        $html = '';

        foreach ($latestCampaigns->campanii as $campanie) {
            $nume = $campanie->nume;
            $descriere = $campanie->descriere;
            $id  = str_replace(' ', '-', strtolower($nume));
        
            // Creating HTML structure
            $html .= '<div class="campanie__preview" style="background-image: url('.$campanie->imagine.');">';
            $html .= '<h2>' . $nume . '</h2>';
            $html .= '<div class="overlay"></div>';
            $html .= '<p>' . substr($descriere, 0, 100)  . '...</p>';
            $html .= '<a href="campanie/id/' . $id . '" >Citește mai mult...</a>';
            $html .= '</div>';
        }

        echo $html;
    }

    public function id ($params) {
        $campanie = $this->model('Campanie', $params);
        if ($campanie->name == null) {
            $this->view('campanie/notfound', ['id' => $params]);
        }
        else $this->view('campanie/campaign', ['campanie' => $campanie]);
    }
}
