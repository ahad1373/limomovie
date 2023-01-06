@extends('home.master')
@section('content')

    <!-- details -->
    <section class="section section--head section--head-fixed section--gradient section--details-bg">
        <div class="section__bg" data-bg="img/details.jpg"></div>
        <div class="container">
            <!-- article -->
            <div class="article">
                <div  class="row">
                    <div class="col-12 col-xl-8">
                        <!-- trailer -->

                        <!-- end trailer -->

                        <!-- article content -->
                        <div class="article__content">
                            <h1>{{$video->original_title}}</h1>

                            <ul class="list">
                                <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg>
                                    {{$video->imdb}}</li>
                                @php
                                $genre = $genre->where('video_id' , '=' , $video->video_id);
                                @endphp

                                <li>{{$video->time}}</li>
                                <li>{{$video->age_category}}</li>
                            </ul>

                            <p>{{$video->synopsis}}</p>
                        </div>
                        <!-- end article content -->
                    </div>

                    <!-- video player -->
                    <div class="col-12 col-xl-8">
                        <img src="{{$video->image}}" alt="">

                        <div class="article__actions article__actions--details">
                            @php
                               $links = $link_download->where('video_id' , '=' , $video->video_id)->all();
                            @endphp

                            <div class="categories">
                                <h3 class="categories__title">لینک های دانلود </h3>
                                @foreach($links as $link)
                                    <a href="{{$link->link}}" class="categories__item">{{$link->title}}</a>
                                @endforeach

                            </div>

                          <div class="categories">
                              <form action="{{route('interest-video')}}" method="post">
                                  @csrf
                                  <input type="hidden" value="{{$video->original_title}}" name="title">
                                  <input type="hidden" value="{{$video->video_id}}" name="interestable_id">
                                  <input type="hidden" value="{{get_class($video)}}" name="interestable_type">
                                  <button class="article__favorites" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg> افزودن به علاقه مندی</button>
                              </form>
                          </div>


                            <!-- add .active class -->
                        </div>
                    </div>
                    <!-- end video player -->

                    <div class="col-12 col-xl-8">
                        <!-- categories -->
                        <div class="categories">
                            @php
                            $actors = $actors->where('video_id' , '=' , $video->video_id)->all();

                            @endphp
                            <h3 class="categories__title">بازیگران </h3>
                            @foreach($actors as $actor)
                                <a href="category.html" class="categories__item">{{$actor->actor_title}}</a>
                            @endforeach

                        </div>
                        <!-- end categories -->
                    </div>
                    <div class="col-12 col-xl-8">
                        <!-- categories -->
                        <div class="categories">
                            <h3 class="categories__title">سبک ها</h3>
                            @foreach($genre as $gen)
                                <a href="category.html" class="categories__item">{{$gen->genre_title}}</a>
                            @endforeach

                        </div>
                        <!-- end categories -->

                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <!-- comments and reviews -->
                                <div class="comments">
                                    <!-- tabs -->
                                    <div class="tab-content">
                                        <!-- comments -->
                                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                                            <ul class="comments__list">
                                                @foreach($comments as $comment)
                                                    <li class="reviews__item">
                                                        <div class="reviews__autor">
                                                            <img class="reviews__avatar" src="img/avatar.svg" alt="">
                                                            <span class="reviews__name">{{$comment->title}}</span>
                                                            <span class="reviews__time">{{jdate($comment->create_at)->format('%d, %B، %Y')}}  {{$comment->user->name}} :توسط</span>
                                                            <span class="reviews__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"></svg>   رتبه:  {{$comment->rank}}</span>
                                                        </div>
                                                        <p class="reviews__text">{{$comment->comment}}</p>
                                                    </li>
                                                @endforeach

                                            </ul>

                                            <form action="{{route('film-comment' , $video->original_title)}}" class="reviews__form" method="post">
                                                @csrf
                                                <input type="hidden" name="commentable_id" value="{{$video->id}}">
                                                <input type="hidden" name="commentable_type" value="{{get_class($video)}}">
                                                <input type="hidden" name="parent" value="0">
                                                <div class="row">
                                                    <div class="col-12 col-md-9 col-lg-10 col-xl-9">
                                                        <div class="sign__group">
                                                            <input type="text" name="title" class="sign__input" placeholder="عنوان">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-3 col-lg-2 col-xl-3">
                                                        <div class="sign__group">
                                                            <select name="rank" id="select" class="sign__select">
                                                                <option value="0">رتبه بندی</option>
                                                                <option value="10">10</option>
                                                                <option value="9">9</option>
                                                                <option value="8">8</option>
                                                                <option value="7">7</option>
                                                                <option value="6">6</option>
                                                                <option value="5">5</option>
                                                                <option value="4">4</option>
                                                                <option value="3">3</option>
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="sign__group">
                                                            <textarea id="text2" name="comment" class="sign__textarea" placeholder="افزودن نظر"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="sign__btn">ارسال</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- end comments -->
                                    </div>
                                    <!-- end tabs -->
                                </div>
                                <!-- end comments and reviews -->
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <!-- end article -->
        </div>
    </section>





@endsection
