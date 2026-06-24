<?php
$data = '{"type":"quiz","quiz":{"quiz1":{"question":{"value":"What is the name of the parent company of Facebook and Instagram?","fileurl":""},"options":{"option1":{"value":"Meta Platforms, Inc.","fileurl":"","responses":0},"option2":{"value":"Amazon","fileurl":"","responses":0},"option3":{"value":"Google ","fileurl":"","responses":0},"option4":{"value":"Twitter","fileurl":"","responses":0},"option5":{"value":"Microsoft","fileurl":"","responses":0}}},"quiz2":{"question":{"value":"You should never ignore someone who contacted you to establish a relationship with your audience according to the law of ____.","fileurl":""},"options":{"option1":{"value":"Acknowledgment","fileurl":"","responses":0},"option2":{"value":"Accessibility","fileurl":"","responses":0},"option3":{"value":"Compounding","fileurl":"","responses":0},"option4":{"value":"Value","fileurl":"","responses":0}}},"quiz3":{"question":{"value":"There is no better social media platform for ____ marketing than LinkedIn.","fileurl":""},"options":{"option1":{"value":"B2C","fileurl":"","responses":0},"option2":{"value":"B2G","fileurl":"","responses":0},"option3":{"value":"B2B","fileurl":"","responses":0},"option4":{"value":"B2B2C","fileurl":"","responses":0}}}}}';

$dataJson = json_decode($data, true);
//print_r($dataJson);

$existingQuizData = [];
foreach($dataJson['quiz'] as $q => $existingQuiz){
	foreach($existingQuiz['options'] as $qo => $existingQuizOptions){
		$existingQuizData[$existingQuiz['question']['value']][$existingQuizOptions['value']] = $existingQuizOptions['responses'];
	}
}
print_r($existingQuizData);
