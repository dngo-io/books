@extends("layout.page")
@section("title", "Rules")
@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="m-portlet m--bg-secondary m-portlet--bordered-semi">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Rules
                                <small>Updated on {{ format_date('2018-03-28') }}</small>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="m-list-timeline">
                        <div class="m-list-timeline__items">
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        In order to maintain quality standards and prevent potential abuse of the system, {{ config("app.name") }} expects its users to abide
                        following rules concerning the {{ config("app.name") }} project.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        Audiobooks provided by the users must be in the public domain. Contributions violating this
                        rule will be rejected by {{ config("app.name") }} Team. Users violating this rule more than 3 times will be permanently banned.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        Audiobooks provided by the users must be produced by them. In order to assess the originality
                        of the provided contents, {{ config("app.name") }} uses a proof-of-work protocol called VoicedSignature. The contributions do not provide VoicedSignature will be rejected. In the case of providing false
                        VoicedSignature, users will be permanently banned.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        The users are only allowed to use relevant tags for their contributions. The users who wish
                        to use different tags in their contributions must provide a footnote explaining their intention to use that tag
                        and address in which way the given tag is relevant to their contribution.Tag spamming contributions will be
                        rejected. The users violating this rule more than 3 times will be temporarily banned.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        The users acting in a disrespectful manner to any member of the community will be permanently
                        banned.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        Discriminative behavior against any identity group such as racism, sexism, xenophobia,
                        homophobia etc is considered intolerable. The users violating this rule will be permanently banned.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        The provided voice recordings cannot be shorter than 20 minutes. The contributions violating
                        this rule will be rejected.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        The users must provide at least 1-minute record of the media volume in each contribution. The
                        contributions violating this rule will be rejected.

                                </span>
                            </div>
                            <div class="m-list-timeline__item">
                                <span class="m-list-timeline__badge m-list-timeline__badge--brand"></span>
                                <span class="m-list-timeline__text">

                        The moderators are granted a right to reject any contribution due to low audio record
                        quality.

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection