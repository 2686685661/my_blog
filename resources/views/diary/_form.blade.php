<form method="post" action="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group col-lg-10 col-md-12 col-sm-10">
        <label>Please Enter Notification Text</label>
        <textarea class="form-control" rows="14" name="Diary[diaryContent]" placeholder="PLease Enter Keyword">
            {{ old('Diary')['diaryContent'] ? old('Diary')['diaryContent'] : $diary->diaryContent }}
        </textarea>
    </div>
    <div class="form-group col-lg-11 col-md-11 col-sm-11">
        <button type="submit" class="btn btn-primary">Compose &amp; Send Ticket</button>
    </div>
</form>