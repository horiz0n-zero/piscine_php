<?php
	function is_sortr($elements) {
		if (is_array($elements)) {
			$sorted_elements = $elements;
			$index = 0;
			$count = count($elements);

			sort($sorted_elements);
			$sorted_elements = array_reverse($sorted_elements);
			while ($index < $count) {
				if ($sorted_elements[$index] != $elements[$index])
					return false;
				$index++;
			}
			return true;
		}
		return false;
	}

	function is_sort($elements) {
		if (is_array($elements)) {
			$sorted_elements = $elements;
			$index = 0;
			$count = count($elements);

			sort($sorted_elements);
			while ($index < $count) {
				if ($sorted_elements[$index] != $elements[$index])
					return false;
				$index++;
			}
			return true;
		}
		return false;
	}

	function ft_is_sort($elements) {
		if (is_sort($elements) || is_sortr($elements)) {
			return true;
		}
		return false;
	}
?>
