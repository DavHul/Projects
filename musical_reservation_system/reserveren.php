<html>
<head>
<title>Musical</title>
<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "musical_reser";
$conn = new mysqli($servername, $username, $password, $dbname);
$stoelen = [['Rij 1'],['Rij 2'],['Rij 3'],['Rij 4'],['Rij 5'],['Rij 6'],['Rij 7'],['Rij 8'],['Rij 9'],['Rij 10'],['Rij 11'],['Rij 12'],['Rij 13'],['Rij 14'],['Rij 15'],['Rij 16'],['Rij 17'],['Rij 18'],['Rij 19']];
$aantal_stoelen = [23,24,25,26,27,28,29,30,31,32,33,31,32,31,30,31,30,31,34];
for ($x = 0; $x < count($stoelen); $x++){
	for ($y = 0; $y < $aantal_stoelen[$x]; $y++){
		array_push($stoelen[$x], (($x+1)."_".($y+1)));
	}
}

$pos_stoelen = array( ["top: 494px;left: 216px;", "top: 500px;left: 235px;", "top: 505px;left: 253px;", "top: 512px;left: 272px;", "top: 517px;left: 290px;", "top: 523px;left: 309px;", "top: 529px;left: 327px;", "top: 534px;left: 345px;", "top: 534px;left: 370px;", "top: 534px;left: 390px;", "top: 534px;left: 410px;", "top: 534px;left: 428px;", "top: 534px;left: 448px;", "top: 534px;left: 468px;", "top: 534px;left: 487px;", "top: 527px;left: 505px;", "top: 520px;left: 523px;", "top: 515px;left: 541px;", "top: 510px;left: 560px;", "top: 506px;left: 579px;", "top: 500px;left: 598px;", "top: 494px;left: 616px;", "top: 488px;left: 635px;"],
["top: 527px;left: 206px;", "top: 533px;left: 225px;", "top: 538px;left: 243px;", "top: 545px;left: 262px;", "top: 550px;left: 280px;", "top: 556px;left: 299px;", "top: 561px;left: 317px;", "top: 567px;left: 335px;", "top: 567px;left: 361px;", "top: 567px;left: 380px;", "top: 567px;left: 399px;", "top: 567px;left: 418px;", "top: 567px;left: 438px;", "top: 567px;left: 457px;", "top: 567px;left: 477px;", "top: 565px;left: 497px;", "top: 560px;left: 514px;", "top: 555px;left: 532px;", "top: 550px;left: 550px;", "top: 543px;left: 570px;", "top: 537px;left: 589px;", "top: 533px;left: 607px;", "top: 526px;left: 626px;", "top: 520px;left: 644px;"], 
["top: 562px;left: 197px;", "top: 566px;left: 215px;", "top: 572px;left: 232px;", "top: 578px;left: 252px;", "top: 583px;left: 271px;", "top: 589px;left: 289px;", "top: 595px;left: 305px;", "top: 600px;left: 326px;", "top: 605px;left: 351px;", "top: 605px;left: 370px;", "top: 605px;left: 389px;", "top: 605px;left: 408px;", "top: 605px;left: 428px;", "top: 605px;left: 447px;", "top: 605px;left: 467px;", "top: 605px;left: 487px;", "top: 600px;left: 505px;", "top: 595px;left: 521px;", "top: 590px;left: 541px;", "top: 583px;left: 561px;", "top: 577px;left: 580px;", "top: 573px;left: 598px;", "top: 566px;left: 617px;", "top: 563px;left: 635px;", "top: 556px;left: 654px;"],
["top: 595px;left: 187px;", "top: 600px;left: 205px;", "top: 605px;left: 222px;", "top: 610px;left: 242px;", "top: 615px;left: 261px;", "top: 620px;left: 279px;", "top: 626px;left: 295px;", "top: 633px;left: 316px;"   , "top: 634px;left: 341px;", "top: 634px;left: 360px;","top: 634px;left: 379px;","top: 634px;left: 398px;","top: 634px;left: 417px;","top: 634px;left: 436px;","top: 634px;left: 455px;","top: 634px;left: 474px;","top: 634px;left: 495px;"    , "top: 630px;left: 515px;", "top: 625px;left: 533px;", "top: 620px;left: 552px;", "top: 615px;left: 571px;", "top: 609px;left: 590px;", "top: 603px;left: 609px;", "top: 598px;left: 628px;", "top: 590px;left: 644px;", "top: 585px;left: 663px;"],
["top: 626px;left: 176px;", "top: 631px;left: 195px;", "top: 636px;left: 214px;", "top: 641px;left: 233px;", "top: 646px;left: 252px;", "top: 652px;left: 271px;", "top: 657px;left: 290px;", "top: 662px;left: 309px;"   , "top: 665px;left: 331px;", "top: 665px;left: 350px;","top: 665px;left: 369px;","top: 665px;left: 388px;","top: 665px;left: 407px;","top: 665px;left: 426px;","top: 665px;left: 445px;","top: 665px;left: 464px;","top: 665px;left: 485px;","top: 665px;left: 504px;"    , "top: 662px;left: 523px;" , "top: 657px;left: 543px;", "top: 652px;left: 563px;", "top: 647px;left: 581px;", "top: 640px;left: 601px;", "top: 635px;left: 619px;", "top: 630px;left: 635px;", "top: 625px;left: 653px;", "top: 620px;left: 671px;"],
["top: 658px;left: 166px;", "top: 663px;left: 185px;", "top: 668px;left: 204px;", "top: 673px;left: 223px;", "top: 678px;left: 242px;", "top: 683px;left: 261px;", "top: 688px;left: 280px;", "top: 696px;left: 298px;"   , "top: 698px;left: 321px;", "top: 698px;left: 340px;","top: 698px;left: 359px;","top: 698px;left: 378px;","top: 698px;left: 397px;","top: 698px;left: 417px;","top: 698px;left: 437px;","top: 698px;left: 456px;","top: 698px;left: 477px;","top: 698px;left: 496px;","top: 698px;left: 515px;"    , "top: 695px;left: 534px;", "top: 690px;left: 552px;", "top: 685px;left: 572px;", "top: 680px;left: 591px;", "top: 675px;left: 609px;", "top: 670px;left: 625px;", "top: 665px;left: 644px;", "top: 659px;left: 664px;", "top: 654px;left: 683px;"],
["top: 691px;left: 157px;", "top: 696px;left: 176px;", "top: 701px;left: 195px;", "top: 706px;left: 214px;", "top: 711px;left: 233px;", "top: 717px;left: 252px;", "top: 722px;left: 271px;", "top: 727px;left: 287px;"   , "top: 732px;left: 312px;", "top: 732px;left: 330px;","top: 732px;left: 348px;","top: 732px;left: 368px;","top: 732px;left: 387px;","top: 732px;left: 407px;","top: 732px;left: 428px;","top: 732px;left: 447px;","top: 732px;left: 466px;","top: 732px;left: 487px;","top: 732px;left: 506px;","top: 732px;left: 525px;"    , "top: 729px;left: 542px;", "top: 724px;left: 562px;", "top: 719px;left: 581px;", "top: 714px;left: 599px;", "top: 709px;left: 618px;", "top: 702px;left: 636px;", "top: 697px;left: 656px;", "top: 692px;left: 675px;", "top: 687px;left: 692px;"],
["top: 724px;left: 146px;", "top: 729px;left: 165px;", "top: 734px;left: 185px;", "top: 739px;left: 204px;", "top: 744px;left: 223px;", "top: 750px;left: 242px;", "top: 755px;left: 261px;", "top: 760px;left: 276px;"   , "top: 768px;left: 302px;", "top: 768px;left: 321px;","top: 768px;left: 339px;","top: 768px;left: 359px;","top: 768px;left: 378px;","top: 768px;left: 398px;","top: 768px;left: 419px;","top: 768px;left: 438px;","top: 768px;left: 457px;","top: 768px;left: 478px;","top: 768px;left: 497px;","top: 768px;left: 516px;","top: 768px;left: 535px;"    ,"top: 762px;left: 554px;","top: 757px;left: 571px;","top: 752px;left: 590px;","top: 747px;left: 609px;","top: 742px;left: 627px;","top: 735px;left: 646px;","top: 730px;left: 664px;","top: 725px;left: 683px;","top: 720px;left: 701px;"],
["top: 756px;left: 135px;", "top: 761px;left: 154px;", "top: 766px;left: 173px;", "top: 771px;left: 192px;", "top: 776px;left: 211px;", "top: 782px;left: 230px;", "top: 787px;left: 249px;", "top: 794px;left: 268px;"   , "top: 800px;left: 292px;", "top: 800px;left: 312px;","top: 800px;left: 330px;","top: 800px;left: 350px;","top: 800px;left: 369px;","top: 800px;left: 389px;","top: 800px;left: 410px;","top: 800px;left: 429px;","top: 800px;left: 448px;","top: 800px;left: 469px;","top: 800px;left: 488px;","top: 800px;left: 507px;","top: 800px;left: 526px;","top: 800px;left: 545px;"    ,"top: 795px;left: 563px;","top: 790px;left: 582px;","top: 785px;left: 601px;","top: 778px;left: 619px;","top: 773px;left: 637px;","top: 768px;left: 656px;","top: 763px;left: 674px;","top: 758px;left: 692px;","top: 753px;left: 710px;"],
["top: 789px;left: 127px;", "top: 794px;left: 146px;", "top: 800px;left: 165px;", "top: 805px;left: 184px;", "top: 811px;left: 203px;", "top: 817px;left: 222px;", "top: 822px;left: 239px;", "top: 827px;left: 255px;"   , "top: 833px;left: 282px;", "top: 833px;left: 303px;","top: 833px;left: 321px;","top: 833px;left: 341px;","top: 833px;left: 360px;","top: 833px;left: 380px;","top: 833px;left: 401px;","top: 833px;left: 420px;","top: 833px;left: 439px;","top: 833px;left: 460px;","top: 833px;left: 479px;","top: 833px;left: 498px;","top: 833px;left: 517px;","top: 833px;left: 536px;","top: 833px;left: 555px;"    ,"top: 828px;left: 573px;","top: 823px;left: 591px;","top: 817px;left: 609px;","top: 811px;left: 628px;","top: 806px;left: 647px;","top: 801px;left: 664px;","top: 796px;left: 683px;","top: 790px;left: 702px;","top: 785px;left: 721px;"],
["top: 822px;left: 116px;", "top: 827px;left: 135px;", "top: 832px;left: 154px;", "top: 837px;left: 173px;", "top: 842px;left: 192px;", "top: 846px;left: 211px;", "top: 851px;left: 230px;", "top: 856px;left: 249px;"   , "top: 865px;left: 273px;", "top: 865px;left: 294px;","top: 865px;left: 312px;","top: 865px;left: 332px;","top: 865px;left: 351px;","top: 865px;left: 371px;","top: 865px;left: 392px;","top: 865px;left: 411px;","top: 865px;left: 430px;","top: 865px;left: 451px;","top: 865px;left: 470px;","top: 865px;left: 489px;","top: 865px;left: 508px;","top: 865px;left: 527px;","top: 865px;left: 544px;","top: 865px;left: 565px;"    ,"top: 861px;left: 582px;","top: 855px;left: 601px;","top: 850px;left: 620px;","top: 845px;left: 638px;","top: 839px;left: 656px;","top: 833px;left: 674px;","top: 828px;left: 692px;","top: 823px;left: 711px;","top: 818px;left: 730px;"],
["top: 854px;left: 107px;", "top: 859px;left: 126px;", "top: 864px;left: 145px;", "top: 869px;left: 164px;", "top: 875px;left: 183px;", "top: 881px;left: 202px;", "top: 886px;left: 221px;"                              , "top: 899px;left: 263px;", "top: 899px;left: 285px;","top: 899px;left: 303px;","top: 899px;left: 323px;","top: 899px;left: 342px;","top: 899px;left: 362px;","top: 899px;left: 382px;","top: 899px;left: 401px;","top: 899px;left: 421px;","top: 899px;left: 440px;","top: 899px;left: 459px;","top: 899px;left: 478px;","top: 899px;left: 497px;","top: 899px;left: 515px;","top: 899px;left: 534px;","top: 899px;left: 555px;","top: 899px;left: 573px;"    ,"top: 882px;left: 628px;","top: 878px;left: 646px;","top: 872px;left: 666px;","top: 865px;left: 684px;","top: 860px;left: 702px;","top: 855px;left: 721px;","top: 850px;left: 740px;"],
["top: 889px;left: 96px; ", "top: 894px;left: 114px;", "top: 900px;left: 135px;", "top: 905px;left: 154px;", "top: 909px;left: 173px;", "top: 915px;left: 192px;", "top: 920px;left: 211px;"                              , "top: 930px;left: 256px;", "top: 930px;left: 275px;","top: 930px;left: 293px;","top: 930px;left: 313px;","top: 930px;left: 332px;","top: 930px;left: 351px;","top: 930px;left: 371px;","top: 930px;left: 390px;","top: 930px;left: 410px;","top: 930px;left: 429px;","top: 930px;left: 448px;","top: 930px;left: 467px;","top: 930px;left: 486px;","top: 930px;left: 504px;","top: 930px;left: 523px;","top: 930px;left: 544px;","top: 930px;left: 562px;","top: 930px;left: 581px;"    ,"top: 915px;left: 636px;","top: 910px;left: 656px;","top: 905px;left: 674px;","top: 900px;left: 692px;","top: 893px;left: 711px;","top: 888px;left: 730px;","top: 883px;left: 749px;"],

["top: 997px;left: 83px; ", "top: 1002px;left: 102px; ", "top: 1007px;left: 120px; ", "top: 1013px;left: 139px; ", "top: 1019px;left: 157px; ", "top: 1024px;left: 174px; ", "top: 1029px;left: 193px; ", "top: 1035px;left: 211px; ", "top: 1040px;left: 230px; ", "top: 1055px;left: 304px; ", "top: 1055px;left: 324px; ", "top: 1055px;left: 342px; ", "top: 1055px;left: 361px; ", "top: 1055px;left: 381px; ", "top: 1055px;left: 401px; ", "top: 1055px;left: 420px; ", "top: 1055px;left: 439px; ", "top: 1055px;left: 458px; ", "top: 1055px;left: 477px; ", "top: 1055px;left: 496px; ", "top: 1055px;left: 516px; ", "top: 1055px;left: 534px; ",        "top: 1040px;left: 606px; ", "top: 1035px;left: 625px; ", "top: 1030px;left: 644px; ", "top: 1025px;left: 662px; ", "top: 1019px;left: 680px; ", "top: 1014px;left: 699px; ", "top: 1009px;left: 717px; ", "top: 1003px;left: 736px; ", "top: 997px;left: 754px; "],
["top: 1035px;left: 90px; ", "top: 1040px;left: 110px; ", "top: 1046px;left: 128px; ", "top: 1051px;left: 146px; ", "top: 1056px;left: 165px; ", "top: 1063px;left: 184px; ", "top: 1068px;left: 201px; ", "top: 1074px;left: 220px; ", "top: 1090px;left: 293px; ", "top: 1090px;left: 313px; ", "top: 1090px;left: 333px; ", "top: 1090px;left: 352px; ", "top: 1090px;left: 371px; ", "top: 1090px;left: 390px; ", "top: 1090px;left: 409px; ", "top: 1090px;left: 428px; ", "top: 1090px;left: 447px; ", "top: 1090px;left: 467px; ", "top: 1090px;left: 486px; ", "top: 1090px;left: 505px; ", "top: 1090px;left: 524px; ", "top: 1090px;left: 543px; ",         "top: 1074px;left: 615px; ", "top: 1069px;left: 634px; ", "top: 1063px;left: 653px; ", "top: 1057px;left: 671px; ", "top: 1052px;left: 689px; ", "top: 1047px;left: 708px; ", "top: 1042px;left: 726px; ", "top: 1036px;left: 745px; "],
["top: 1068px;left: 81px; ", "top: 1073px;left: 101px; ", "top: 1078px;left: 119px; ", "top: 1083px;left: 137px; ", "top: 1089px;left: 156px; ", "top: 1096px;left: 174px; ", "top: 1102px;left: 191px; ", "top: 1107px;left: 210px; ", "top: 1122px;left: 284px; ", "top: 1122px;left: 304px; ", "top: 1122px;left: 324px; ", "top: 1122px;left: 343px; ", "top: 1122px;left: 362px; ", "top: 1122px;left: 380px; ", "top: 1122px;left: 400px; ", "top: 1122px;left: 419px; ", "top: 1122px;left: 438px; ", "top: 1122px;left: 457px; ", "top: 1122px;left: 476px; ", "top: 1122px;left: 495px; ", "top: 1122px;left: 514px; ", "top: 1122px;left: 533px; ", "top: 1122px;left: 554px; ",         "top: 1106px;left: 625px; ", "top: 1101px;left: 643px; ", "top: 1096px;left: 662px; ", "top: 1090px;left: 681px; ", "top: 1085px;left: 700px; ", "top: 1080px;left: 718px; ", "top: 1074px;left: 735px; ", "top: 1069px;left: 754px; "],
["top: 1105px;left: 90px; ", "top: 1110px;left: 109px; ", "top: 1116px;left: 127px; ", "top: 1123px;left: 146px; ", "top: 1128px;left: 164px; ", "top: 1133px;left: 182px; ", "top: 1139px;left: 200px; ", "top: 1155px;left: 274px; ", "top: 1155px;left: 294px; ", "top: 1155px;left: 314px; ", "top: 1155px;left: 333px; ", "top: 1155px;left: 352px; ", "top: 1155px;left: 370px; ", "top: 1155px;left: 390px; ", "top: 1155px;left: 409px; ", "top: 1155px;left: 428px; ", "top: 1155px;left: 447px; ", "top: 1155px;left: 466px; ", "top: 1155px;left: 485px; ", "top: 1155px;left: 504px; ", "top: 1155px;left: 523px; ", "top: 1155px;left: 544px; ", "top: 1155px;left: 563px; ",         "top: 1139px;left: 634px; ", "top: 1134px;left: 653px; ", "top: 1129px;left: 672px; ", "top: 1123px;left: 690px; ", "top: 1117px;left: 709px; ", "top: 1113px;left: 727px; ", "top: 1107px;left: 746px; "],
["top: 1139px;left: 80px; ", "top: 1144px;left: 99px; ", "top: 1149px;left: 117px; ", "top: 1155px;left: 136px; ", "top: 1160px;left: 154px; ", "top: 1166px;left: 172px; ", "top: 1171px;left: 190px; ", "top: 1187px;left: 265px; ", "top: 1187px;left: 285px; ", "top: 1187px;left: 304px; ", "top: 1187px;left: 323px; ", "top: 1187px;left: 342px; ", "top: 1187px;left: 360px; ", "top: 1187px;left: 380px; ", "top: 1187px;left: 399px; ", "top: 1187px;left: 418px; ", "top: 1187px;left: 438px; ", "top: 1187px;left: 456px; ", "top: 1187px;left: 475px; ", "top: 1187px;left: 494px; ", "top: 1187px;left: 513px; ", "top: 1187px;left: 534px; ", "top: 1187px;left: 554px; ", "top: 1187px;left: 573px; ",         "top: 1171px;left: 644px; ", "top: 1166px;left: 663px; ", "top: 1161px;left: 681px; ", "top: 1156px;left: 700px; ", "top: 1150px;left: 718px; ", "top: 1145px;left: 736px; ", "top: 1140px;left: 754px; "],
["top: 1177px;left: 88px; ", "top: 1182px;left: 107px; ", "top: 1187px;left: 126px; ", "top: 1192px;left: 144px; ", "top: 1199px;left: 162px; ", "top: 1204px;left: 180px; ", "top: 1218px;left: 210px; ", "top: 1218px;left: 230px; ", "top: 1218px;left: 249px; ", "top: 1218px;left: 269px; ", "top: 1218px;left: 288px; ", "top: 1218px;left: 307px; ", "top: 1218px;left: 326px; ", "top: 1218px;left: 345px; ", "top: 1218px;left: 364px; ", "top: 1218px;left: 383px; ", "top: 1218px;left: 402px; ", "top: 1218px;left: 421px; ", "top: 1218px;left: 441px; ", "top: 1218px;left: 461px; ", "top: 1218px;left: 480px; ", "top: 1218px;left: 500px; ", "top: 1218px;left: 519px; ", "top: 1218px;left: 538px; ", "top: 1218px;left: 557px; ", "top: 1218px;left: 577px; ", "top: 1218px;left: 597px; ", "top: 1218px;left: 617px; ",         "top: 1201px;left: 663px; ", "top: 1196px;left: 682px; ", "top: 1191px;left: 700px; ", "top: 1186px;left: 718px; ", "top: 1179px;left: 737px; ", "top: 1174px;left: 756px; "]
);
$show = $datum = '';
$fout = false;
$prijs_woensdag_avond = 7.50;
$prijs_donderdag_avond = 12.50;
$prijs_vrijdag_middag = 5.0;
$prijs_vrijdag_avond = 12.50;

?>
</head>
<body>
<div>
<img src="logo.png" alt="Logo CLV musical" width="150" height="100"><a style="font-family:Verdana;font-size: 100px;">CLV musical</a>
</div>
<div>
	<table style="width:100%; text-align:center;background-color:#2f82c7;">
	<tr>
		<td style="border-style: solid;width=33.33%;"><a href="index.php" style="color:White;font-family:Arial;font-size: 25px;">Home</a></td><td style="border-style: solid;width=33%;"><a href="reserveren.php" style="color:White;font-family:Arial;font-size: 25px;">Reserveren</a></td><td style="border-style: solid;width=33%;"><a href = "info_zien.php" style="color:White;font-family:Arial;font-size: 25px;">Inloggen</a></td>
	</tr>
	</table>
</div>
<div>
<div style="width:95%;background-color:#2f82c7; position: absolute; top: 200px;left: 16px; padding:20px">
<h1 style="color:White;font-family:Arial;font-size: 50px;text-align:center;">Reserveren</h1>
<?php
if (!isset($_POST['datum_tickets']) and !isset($_POST['bevestig_gegevens']) and !isset($_POST['submit_stoelen'])){
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
	echo '<p style="font-family:Arial;font-size: 25px;">Show: <select name="datum" id="datum">
		<option value="Empty" selected disabled hidden> </option>
		<option value="woensdag_avond">Try-out - Woensdag avond</option>
		<option value="donderdag_avond">Premiere - Donderdag avond</option>
		<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
		<option value="vrijdag_avond">Vrijdag avond</option>
	</select> <br>';
	echo "Aantal tickets: <input type='number' id='aantal_tickets' name='aantal_tickets' min='1' max='150'></p>";
	echo '<br><input type="submit" value="Bevestig keuze" name="datum_tickets">';
	echo '</form>';
}

if (isset($_POST['datum_tickets'])){
	$datum = $_POST['datum'];
	$aantal_tickets = $_POST['aantal_tickets'];
	#echo $datum;
	#echo $aantal_tickets;
	
	$sql = "SELECT * FROM zaal_vrijdag_middag WHERE status=0";
	$result = $conn->query($sql);
	$aantal_plekken = $result->num_rows;
	if ($datum != "Empty" and $aantal_plekken >= $aantal_tickets){
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo '<p style="font-family:Arial;font-size: 25px;">Show: <select name="datum" id="datum">
			<option value="Empty" selected disabled hidden> </option>';
			if ($datum == "woensdag_avond"){
				echo '<option value="woensdag_avond" selected>Try-out - Woensdag avond</option>
				<option value="donderdag_avond">Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}
			if ($datum == "donderdag_avond"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" selected>Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}if ($datum == "vrijdag_middag"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" selected>Premiere - Donderdag avond</option>
				<option value="vrijdag_middag" selected>Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}
			if ($datum == "vrijdag_avond"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" >Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond" selected>Vrijdag avond</option>';
			}
		echo '</select> <br>';
		echo "Aantal tickets: <input type='number' id='aantal_tickets' name='aantal_tickets' min='1' max='150' value=$aantal_tickets></p>";
		echo '</form>';
	
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo "<p style='font-family:Arial;font-size: 25px;'>Voornaam:  <input type='text' id='fname' name='fname'><br>";
		echo "Tussenvoegsel: <input type='text' id='Tussenvoegsel' name='Tussenvoegsel'><br>";
		echo "Achternaam: <input type='text' id='Achternaam' name='Achternaam'><br>";
		echo "Email: <input type='text' id='email' name='email'><br>";
		echo "<input type='hidden' id='info_hidden' name='datum' value=$datum>";
		echo "<input type='hidden' id='info_hidden' name='submit_tickets' value=$aantal_tickets>";
		echo '<br><input type="submit" value="Bevestig gegevens" name="bevestig_gegevens"></p>';
		echo '</form>';
	}else{
		if ($aantal_plekken < $aantal_tickets){
			echo "<p style='font-family:Arial;font-size: 25px;'>Deze datum heeft niet voldoende plekken, kies alstublieft een andere datum.</p>";
		}else{
			echo "<p style='font-family:Arial;font-size: 25px;'>Deze datum is niet beschikbaar, kies alstublieft een andere datum.</p>";
		}
	}
}
if (isset($_POST['bevestig_gegevens'])){
	$datum = $_POST['datum'];
	$submit_tickets = $_POST['submit_tickets'];
	$fname = $_POST['fname'];
	$tussenvoegsel = $_POST['Tussenvoegsel'];
	$achternaam = $_POST['Achternaam'];
	$email = $_POST['email'];
	echo $datum."<br>";
	
	
	echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo '<p style="font-family:Arial;font-size: 25px;">Show: <select name="datum" id="datum">
			<option value="Empty" selected disabled hidden> </option>';
			if ($datum == "woensdag_avond"){
				echo '<option value="woensdag_avond" selected>Try-out - Woensdag avond</option>
				<option value="donderdag_avond">Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}
			if ($datum == "donderdag_avond"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" selected>Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}if ($datum == "vrijdag_middag"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" selected>Premiere - Donderdag avond</option>
				<option value="vrijdag_middag" selected>Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond">Vrijdag avond</option>';
			}
			if ($datum == "vrijdag_avond"){
				echo '<option value="woensdag_avond" >Try-out - Woensdag avond</option>
				<option value="donderdag_avond" >Premiere - Donderdag avond</option>
				<option value="vrijdag_middag">Matineevoorstelling - Vrijdag middag</option>
				<option value="vrijdag_avond" selected>Vrijdag avond</option>';
			}
		echo '</select> <br>';
		echo "Aantal tickets: <input type='number' id='aantal_tickets' name='aantal_tickets' min='1' max='150' value=$submit_tickets></p>";
		echo '</form>';
	
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo "<p style='font-family:Arial;font-size: 25px;'>Voornaam:  <input type='text' id='fname' name='fname' value=$fname><br>";
		echo "Tussenvoegsel: <input type='text' id='Tussenvoegsel' name='Tussenvoegsel' value=$tussenvoegsel><br>";
		echo "Achternaam: <input type='text' id='Achternaam' name='Achternaam' value=$achternaam><br>";
		echo "Email: <input type='text' id='email' name='email' value=$email><br>";
		echo '</p>';
		echo '</form>';
		
	echo "<div style='absolute; top: 100px;left: 16px;'>";
		echo "<img src='plattegrond.png'>";
		echo '<form method="post" action='.htmlspecialchars($_SERVER["PHP_SELF"]).'>';
		echo "<p style='font-family:Arial;font-size: 18px;'>";
		for ($z = 0; $z < count($stoelen); $z++){
			echo $stoelen[$z][0]." - ";
			for ($x = 0; $x < $aantal_stoelen[$z]; $x++){
				$sql = "SELECT * FROM zaal_".$datum." WHERE (stoelrij= ".($z+1)." and stoelnummer=".($x+1).")";
				$result = $conn->query($sql);
				$status = $result->fetch_assoc();
				if ($status["status"] == 0){
					echo ($x+1)."<div style='position:absolute;".$pos_stoelen[$z][$x].";background:green'><input type='checkbox' name='stoel[]' value=".$stoelen[$z][$x+1]."></div>";
				}else{
					echo ($x+1)."<div style='position:absolute;".$pos_stoelen[$z][$x].";background:red'><input type='checkbox' name='stoel[]' value=".$stoelen[$z][$x+1]." disabled ></div>";
				}
			}
			echo "<br>";
		}
		echo "<input type='hidden' id='info_hidden' name='datum' value=$datum>";
		echo "<input type='hidden' id='info_hidden' name='submit_tickets' value=$submit_tickets>";
		echo "<input type='hidden' id='info_hidden' name='fname' value=$fname>";
		echo "<input type='hidden' id='info_hidden' name='between' value=$tussenvoegsel>";
		echo "<input type='hidden' id='info_hidden' name='lname' value=$achternaam>";
		echo "<input type='hidden' id='info_hidden' name='email' value=$email>";
		echo '<br><input type="submit" value="Stoelen kiezen" name="submit_stoelen"> </p>';
		echo '</form>';
	echo '</div>';
}
 if(isset($_POST['submit_stoelen']) ){
	$datum = $_POST['datum'];
	$submit_tickets = $_POST['submit_tickets'];
	$fname = $_POST['fname'];
	$tussenvoegsel = $_POST['between'];
	$achternaam = $_POST['lname'];
	$stoelen = $_POST['stoel'];
	$email = $_POST['email'];
	$stoelen = $_POST['stoel'];
	if ($datum == 'woensdag_avond'){
		$kosten = $prijs_woensdag_avond * $submit_tickets;
	}else if ($datum == 'donderdag_avond'){
		$kosten = $prijs_donderdag_avond * $submit_tickets;
	}else if ($datum == 'vrijdag_avond'){
		$kosten = $prijs_vrijdag_avond * $submit_tickets;
	}else if ($datum == 'vrijdag_middag'){
		$kosten = $prijs_vrijdag_middag * $submit_tickets;
	}
	
	print_r($_POST['stoel']);
	echo $show." - ";
	echo $datum." - ";
	echo $submit_tickets." - ";
	echo $fname." ";
	echo $tussenvoegsel." ";
	echo $achternaam."<br>";
	
	if ($submit_tickets == sizeof($stoelen)){
		$sql = "SELECT * FROM reserveringen ORDER BY id DESC LIMIT 1";
		$result = $conn->query($sql);
		$status = $result->fetch_assoc();
		$id = $status['id'] + 1;
		
		$sql = "INSERT INTO reserveringen (id, voornaam, tussenvoegsel, achternaam, email, aantal_tickets, datum, kosten) VALUES ('$id', '$fname', '$tussenvoegsel', '$achternaam', '$email', $submit_tickets, '$datum', $kosten)";
		if ($conn->query($sql) === TRUE) {
			//echo "gegevens ingevoerd <br>";
		}else{
			//echo "fout <br>". $conn->error;
		}
		foreach ($stoelen as $value) {
			//echo "$value <br>";
			$stoel = explode("_", $value);
			$rij = $stoel[0];
			$nr = $stoel[1];
			$sql = "UPDATE zaal_".$datum." SET status=2, reservingingsnummer = $id WHERE stoelrij=$rij and stoelnummer =$nr";
			if ($conn->query($sql) === TRUE) {
			  //echo "Record updated successfully";
			} else {
			  //echo "Error updating record: " . $conn->error;
			} 
		}
		echo "<h1 style='font-family:Arial;font-size: 25px;'>>Bedankt voor het reserveren, we zullen spoedig contact opnemen voor de betaling</h2>";
		header("refresh:10;url='index.php'");
	}else{
		echo "Er is iets fout gegaan, kies andere stoelen.";
	}
 }
 mysqli_close($conn);
?>
</div>
</div>
</body>
</html>