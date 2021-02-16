@extends('site.' . config('cms.theme') . '.layout.master')

@section('title', config('cms.site') . ' - Job List')

@section('content')

    {{--page cover--}}
    <div class="content_fullwidth">
        <div class="container">
            <div class="module mid" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url({{ asset('site/theme3/images/slide/01.jpg') }});">
                <h2>Jobs</h2>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    {{--page container--}}
    <div class="container">

        {{--page content--}}
        <div style="width: 100%; margin-top: 20px;">
            <article class="my-text">
                <div class="job-tble">
                    <table>
                        <tbody>
                        <tr>
                            <th>S.N.</th>
                            <th>Job Title</th>
                            <th>Vacancy</th>
                            <th>Country</th>
                            <th>Company</th>
                            <th>Expiry Date</th>
                            <th>Details</th>
                            <th>Apply</th>
                        </tr>
                        @foreach($list as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->vacancy }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->expiry_data }}</td>
                                <td>
                                    <a href="{{ route('site.job.show', ['slug' => $item->slug]) }}" class="read_more">Details</a>
                                </td>
                                <td>
                                    <a class="read_more" href="{{ route('site.job.apply', ['slug' => $item->slug]) }}">Apply Now</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin-top: 20px;">
                        {!! $list->links() !!}
                    </div>
                </div>
            </article>
        </div>

        <div class="clearfix"></div>

    </div>

    <div class="clearfix mar_top2"></div>

@stop
