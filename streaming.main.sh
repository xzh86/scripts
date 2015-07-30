hadoop org.apache.hadoop.streaming.HadoopStreaming \
        -Dhadoop.client.ugi=imeda,imeda \
        -input $input \
        -output $output \
        -mapper mapper.py \
        -reducer reducer.py \
        -file mapper.py \
        -file hmt.interface.decrypt.key \
        -file reducer.py
        
  # hmt.interface.decrypt.key文件可以在map，reduce的脚本中直接使用。
