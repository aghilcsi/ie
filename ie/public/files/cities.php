<?php

function get_cities() {
	return [
		[ "code" => "1", "name" => "آذربایجان شرقی" ],
		[ "code" => "2", "name" => "آذربایجان غربی" ],
		[ "code" => "3", "name" => "اردبیل" ],
		[ "code" => "4", "name" => "اصفهان" ],
		[ "code" => "5", "name" => "البرز" ],
		[ "code" => "6", "name" => "ایلام" ],
		[ "code" => "7", "name" => "بوشهر" ],
		[ "code" => "8", "name" => "تهران" ],
		[ "code" => "9", "name" => "چهارمحال و بختیاری" ],
		[ "code" => "10", "name" => "خراسان جنوبی" ],
		[ "code" => "11", "name" => "خراسان رضوی" ],
		[ "code" => "12", "name" => "خراسان شمالی" ],
		[ "code" => "13", "name" => "خوزستان" ],
		[ "code" => "14", "name" => "زنجان" ],
		[ "code" => "15", "name" => "سمنان" ],
		[ "code" => "16", "name" => "سیستان و بلوچستان" ],
		[ "code" => "17", "name" => "فارس" ],
		[ "code" => "18", "name" => "قزوین" ],
		[ "code" => "19", "name" => "قم" ],
		[ "code" => "20", "name" => "کردستان" ],
		[ "code" => "21", "name" => "کرمان" ],
		[ "code" => "22", "name" => "کرمانشاه" ],
		[ "code" => "23", "name" => "کهگیلویه و بویراحمد" ],
		[ "code" => "24", "name" => "گلستان" ],
		[ "code" => "25", "name" => "گیلان" ],
		[ "code" => "26", "name" => "مازندران" ],
		[ "code" => "27", "name" => "لرستان" ],
		[ "code" => "28", "name" => "مرکزی" ],
		[ "code" => "29", "name" => "هرمزگان" ],
		[ "code" => "30", "name" => "همدان" ],
		[ "code" => "31", "name" => "یزد" ]
	];
}

function find_city( $code ) {
	$cities = [
		"1"  => "آذربایجان شرقی",
		"2"  => "آذربایجان غربی",
		"3"  => "اردبیل",
		"4"  => "اصفهان",
		"5"  => "البرز",
		"6"  => "ایلام",
		"7"  => "بوشهر",
		"8"  => "تهران",
		"9"  => "چهارمحال و بختیاری",
		"10" => "خراسان جنوبی",
		"11" => "خراسان رضوی",
		"12" => "خراسان شمالی",
		"13" => "خوزستان",
		"14" => "زنجان",
		"15" => "سمنان",
		"16" => "سیستان و بلوچستان",
		"17" => "فارس",
		"18" => "قزوین",
		"19" => "قم",
		"20" => "کردستان",
		"21" => "کرمان",
		"22" => "کرمانشاه",
		"23" => "کهگیلویه و بویراحمد",
		"24" => "گلستان",
		"25" => "گیلان",
		"26" => "مازندران",
		"27" => "لرستان",
		"28" => "مرکزی",
		"29" => "هرمزگان",
		"30" => "همدان",
		"31" => "یزد"
	];
	if ( $code > 0 && $code <= 31 ) {
		return $cities[ $code ];
	}

	return '';
}
