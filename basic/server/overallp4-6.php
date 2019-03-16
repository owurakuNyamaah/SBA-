<?php                
                $query = "SELECT
                *,
                @current := IF(@prev = TOTAL, @current, @add) AS POSITION,
                @prev := TOTAL,
                @add := @add +1
            FROM
                (
                SELECT
                    @current := 0,
                    @prev := NULL,
                    @add := 1
            ) r,
            (
                SELECT
                    *,
                    (
                        ENGLISH + SCIENCE + MATHS + ARTS + ICT + CITIZEN + RME + GH + FRENCH
                    ) AS TOTAL
                FROM
                    (
                    SELECT
                        eng.student_name AS STUDENT,
                        eng.total_100 AS ENGLISH,
                        science.total_100 AS SCIENCE,
                        maths.total_100 AS MATHS,
                        arts.total_100 AS ARTS,
                        ict.total_100 AS ICT,
                        citizen.total_100 AS CITIZEN,
                        rme.total_100 AS RME,
                        gh.total_100 AS GH,
                        french.total_100 AS FRENCH
                    FROM
                        `eng`
                    INNER JOIN science ON eng.student_name = science.student_name
                    INNER JOIN maths ON eng.student_name = maths.student_name
                    INNER JOIN arts ON eng.student_name = arts.student_name
                    INNER JOIN ict ON eng.student_name = ict.student_name
                    INNER JOIN citizen ON eng.student_name = citizen.student_name
                    INNER JOIN rme ON eng.student_name = rme.student_name
                    INNER JOIN gh ON eng.student_name = gh.student_name
                    INNER JOIN french ON eng.student_name = french.student_name
                ) AS DT
            GROUP BY
                STUDENT
            ) AS DERIVED
            ORDER BY
                TOTAL
            DESC";
                            
                $result = mysqli_query($connect, $query);
                
                if(mysqli_num_rows($result) > 0 ) {
                    echo "<table>
                            <tr>
                                <th>POSITION</th>
                                <th>NAME</th>
                                <th>ENGLISH</th>
                                <th>SCIENCE</th>
                                <th>MATHS</th>
                                <th>C.ARTS</th>
                                <th>ICT</th>
                                <th>BDT</th>
                                <th>CITIZENSHIP</th>
                                <th>GH</th>
                                <th>FRENCH</th>
                                <th>TOTAL</th>
                            </tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td style= 'color:red;text-align:center;'>";
                                $n = $row['POSITION'];
                                if($n==1 || ($n%10==1 && $n%100 !=11)){echo $n.'<sup>st</sup>';}
                                else if($n==2 || ($n%10==2 && $n%100 !=12)) {echo $n.'<sup>nd</sup>';}
                                else if($n==3 || ($n%10==3 && $n%100 !=13)) {echo $n.'<sup>rd</sup>';}
                                else {echo $n.'<sup>th</sup>';}
                        echo    "</td>
                                <td>$row[STUDENT]</td>
                                <td>$row[ENGLISH]</td>
                                <td>$row[SCIENCE]</td>
                                <td>$row[MATHS]</td>
                                <td>$row[ARTS]</td>
                                <td>$row[ICT]</td>
                                <td>$row[CITIZEN]</td>
                                <td>$row[RME]</td>
                                <td>$row[GH]</td>
                                <td>$row[FRENCH]</td>
                                <td style='color:blue;text-align:center;'>$row[TOTAL]</td>
                            </tr>";
                    }
                    echo "</table>";
                    
                }else {
                    echo "<table>
                            <tr>
                                <th>NAME</th>
                                <th>ENGLISH</th>
                                <th>MATHS</th>
                                <th>SCIENCE</th>
                                <th>C.ARTS</th>
                                <th>GH</th>
                                <th>CITIZENSHIP</th>
                                <th>FRENCH</th>
                                <th>ICT</th>
                                <th>RME</th>
                                <th>TOTAL</th>
                                <th>POSITION</th>
                            </tr>
                        </table>";
                    echo "<h1 style='padding:50px'>SBA not complete</h1>";
                }

?>