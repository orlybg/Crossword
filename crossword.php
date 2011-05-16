<?php
    class Board {
        private $arrBoard;
        private $arrWords;
	private $iCols;
	private $iRows;
       
        public function Board($nRows, $nCols) {
            $this->iCols = $nCols;
	    $this->iRows = $nRows;

            for ($col = 0; $col < $this->iCols; $col++) {
                for ($row = 0; $row < $this->iRows; $row++) {
                    $this->arrBoard[$row][$col] = '*';
                }

            }
        }
       
        public function visualize() {
  	    //print_r($this->arrBoard);
           
            echo "<table border='1'>";
            for ($col = 0; $col < $this->iCols; $col++) {
                echo "<tr c='$col'>";
                for ($row = 0; $row < $this->iRows; $row++) {
                    echo "<td r='$row'>" . $this->arrBoard[$row][$col]  . '</td>';
                }
                echo "</tr>";
            }
            echo "</table>";
        }
       
        private function fillRubish() {
           
        }
       
        public function assignWordList($arrList) {
            $this->arrWords = $arrList;
        }
       
        private function writeVerticalWord($sWord) {
            echo "Vertical word: $sWord  </br>";
        }
       
        private function writeHorizontalWord($sWord, $r) {
            $arrWord = str_split($sWord);
            echo "Horizontal word: $sWord  </br>";

	    $row = rand(0, $this->iRows-1);
            $col = rand(0, $this->iCols-1);
            foreach ($arrWord as $sLetter) {
		$this->arrBoard[$col][$row] = $sLetter;
	        $col++;

	    }

        }


        public function writeWords() {
            $i = 0;
            foreach($this->arrWords as $sWord => $sArrange) {
                $i++;
                if ($sArrange == 'v') {
                    $this->writeVerticalWord($sWord);
                } else if ($sArrange == 'h') {
                    $this->writeHorizontalWord($sWord, $i);
                }
            }
        }
    }
   

   
    $oBoard = new Board(10,10);
    $oBoard->visualize();
   
    $arrWords = array(
        'foo' => 'h',
        'bar' => 'v',
        'dog' => 'v',
        'cat' => 'h'
    );
   
    $oBoard->assignWordList($arrWords);
    $oBoard->writeWords();
   
    echo '</br>================================================== </br>';
    $oBoard->visualize();


?>
