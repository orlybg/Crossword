<?php
    class Board {
        private $arrBoard;
        private $arrWords;
       
        public function Board($nRows, $nCols) {
            $x=1;
            for ($col = 0; $col < $nCols; $col++) {
                for ($row = 0; $row < $nRows; $row++) {
                    $this->arrBoard[$row][$col] = $x++;
                }
                $x=1;
            }
        }
       
        public function visualize() {
            $nCols = count($this->arrBoard[0]);
            $nRows = count($this->arrBoard);
           
            echo "<table border='1'>";
            for ($col = 0; $col < $nCols; $col++) {
                echo "<tr>";
                for ($row = 0; $row < $nRows; $row++) {
                    echo '<td>' . $this->arrBoard[$row][$col]  . '</td>';
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
            echo "Horizontal word: $sWord  </br>";
            $this->arrBoard[$r] = $sWord;
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
