<!-- select topic1 as topic from feedbackform_db where topic1 is not null union select topic2 as topic from feedbackform_db where topic2 is not null union select topic3 as topic from feedbackform_db where topic3 is not null union select topic4 as topic from feedbackform_db where topic4 is not null union select topic5 as topic from feedbackform_db where topic5 is not null union select topic6 as topic from feedbackform_db where topic6 is not null union select topic7 as topic from feedbackform_db where topic7 is not null union select topic8 as topic from feedbackform_db where topic8 is not null -->

<!-- select topic1 as topic from feedbackform_db where topic1 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic2 as topic from feedbackform_db where topic2 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic3 as topic from feedbackform_db where topic3 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic4 as topic from feedbackform_db where topic4 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic5 as topic from feedbackform_db where topic5 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic6 as topic from feedbackform_db where topic6 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic7 as topic from feedbackform_db where topic7 is not null and event_date between 2016-06-03 and 2016-06-08 union select topic8 as topic from feedbackform_db where topic8 is not null and event_date between 2016-06-03 and 2016-06-08

select topic1 as topic from feedbackform_db where topic1 is not null union select topic2 as topic from feedbackform_db where topic2 is not null union select topic3 as topic from feedbackform_db where topic3 is not null union select topic4 as topic from feedbackform_db where topic4 is not null union select topic5 as topic from feedbackform_db where topic5 is not null union select topic6 as topic from feedbackform_db where topic6 is not null union select topic7 as topic from feedbackform_db where topic7 is not null union select topic8 as topic from feedbackform_db where topic8 is not null WHERE From_date between '2016-06-03' AND '2016-06-08' -->





<!-- select topic1 as topic from feedbackform_db where topic1 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic2 as topic from feedbackform_db where topic2 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic3 as topic from feedbackform_db where topic3 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic4 as topic from feedbackform_db where topic4 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic5 as topic from feedbackform_db where topic5 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic6 as topic from feedbackform_db where topic6 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic7 as topic from feedbackform_db where topic7 is not null AND event_date between '2016-06-03' AND '2016-06-08'
union select topic8 as topic from feedbackform_db where topic8 is not null AND event_date between '2016-06-03' AND '2016-06-08' -->



  //  

  select topic_name, avg(score) from average_topic_score where event_date between STR_TO_DATE('2016-03-01', '%Y-%m-%d') AND STR_TO_DATE('2016-03-31', '%Y-%m-%d') group by topic_name

  select topic_name2, avg(score2) from average_topic_score2 where event_date2 between STR_TO_DATE('2016-06-01', '%Y-%m-%d') AND STR_TO_DATE('2016-06-08', '%Y-%m-%d') group by topic_name2