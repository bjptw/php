<?php
$arr = array(1,43,54,62,21,66,32,78,36,76,39);
//1.冒泡算法，遍历长度n-1遍数组，将大的排最后
function bubbleSort($arr){
	//获取数组长度
	$len = count($arr);
	//执行次数
	$num = 0;
	//控制循环的轮数
	for ($i=1; $i < $len; $i++) { 
		//控制循环的比较次数
		for ($j=0; $j < $len-$i; $j++) { 
			if($arr[$j] > $arr[$j+1]){
				//交替变量
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $t;
			}
			$num++;
		}
	}
	return array($arr,$num);
}
//2.选择排序,每趟选择数组中最小的排最后
function selectSort($arr){
	//获取数组长度
	$len = count($arr);
	//执行次数
	$num = 0;
	//双重循环，外层控制轮数，内层控制次数
	for ($i=0; $i < $len-1; $i++) { 
		//先假设最小值位置
		$p = $i;
		for ($j=$i+1; $j < $len; $j++) { 
			//找到比假设更小的值就赋给假设值
			if($arr[$p] > $arr[$j])
				$p = $j;
			//如果不是原来假设的下标就替换
			if($p != $i){
				$temp = $arr[$i];
				$arr[$i] = $arr[$p];
				$arr[$p] = $temp;
			}
			$num++;
		}
	}
	return array($arr,$num);
}
//3.插入排序，假设前面都排好，现在要把n个数插入到前面后排序
function insertSort($arr){
	//获取数组长度
	$len = count($arr);
	//执行次数
	$num = 0;
	//外循环控制轮数，内循环控制比较和插入的次数
	for ($i=1; $i < $len; $i++) { 
		$temp = $arr[$i];
		for ($j=$i-1; $j >= 0; $j--) {
			$num++;
			//前面比后面数大就替换 
			if($arr[$j] > $temp){
				$arr[$j+1] = $arr[$j];
				$arr[$j] = $temp;
			}else{
				//前面已经排好，没有就不需要移动
				break;
			}
		}
	}
	return array($arr,$num);
}
//快速排序，选择一个基准元素，第一趟将数组分为比基准元素大和小两部分，后面依次划分
function quickSort($arr){
	//获取数组长度
	$len = count($arr);
	if($len <= 1)
		return $arr;
	//假设第一个为基准数
	$base_num = $arr[0];
	//设置左数组和右数组
	$left_array = array();
	$right_array = array();
	//循环将小于基准数的放左边，否则右边
	for ($i=1; $i < $len; $i++) { 
		if($base_num > $arr[$i])
			$left_array[] = $arr[$i];
		else
			$right_array[] = $arr[$i];
	}
	//再递归放两边
	$left_array = quickSort($left_array);
	$right_array = quickSort($right_array);
	//合并
	return array_merge($left_array,array($base_num),$right_array);
}

// $attr = bubbleSort($arr);
// $attr = selectSort($arr);
// $attr = insertSort($arr);
$attr = quickSort($arr);
print_r($attr);