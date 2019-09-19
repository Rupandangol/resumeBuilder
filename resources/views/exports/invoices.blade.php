<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Looking For</th>
        <th>Available For</th>
        <th>Job Category Title</th>
        <th>Job Category</th>
        <th>Expected Salary</th>
        <th>Preferred Location</th>
        <th>Experience year</th>
        <th>asdf</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->fullName }}</td>
            <td>{{ $user->address}}</td>
            <td>{{ $user->mobileNo}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->gender}}</td>
            <td>{{ $user->getProfile->lookingFor}}</td>
            <td>{{ $user->getProfile->availableFor}}</td>
            <td>{{ $user->getProfile->jobCategoryTitle}}</td>
            <td>{{ $user->getProfile->jobCategory}}</td>
            <td>{{ $user->getProfile->expectedSalary}}</td>
            <td>{{ $user->getProfile->preferredLocation}}</td>
            <td>
                @forelse($user->getExp as $item)
                    <?php
                    $startYear=\Carbon\Carbon::parse($item->startTime);
                    ?>
                    @if($item->endTime==='Current')
                        <?php
                        $now=\Carbon\Carbon::now();
                        ?>
                        {{$startYear->diff($now)->format('%yY %mM')}},
                    @else
                        <?php
                        $endYear=\Carbon\Carbon::parse($item->endTime);
                        ?>

                        {{$endYear->diff($startYear)->format('%yY %mM')}},
                    @endif
                @empty
                    No Experience
                @endforelse

            </td>
        </tr>
    @endforeach
    </tbody>
</table>