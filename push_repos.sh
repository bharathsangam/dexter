for dir in */; do
    repo="${dir%/}"

    echo "==============================="
    echo "Processing: $repo"

    cd "$repo" || continue

    # Create repo only if it doesn't exist
    gh repo view bharathsangam/$repo >/dev/null 2>&1 || \
        gh repo create bharathsangam/$repo --private

    # Rename origin only if old-origin doesn't already exist
    if git remote | grep -q "^origin$" && ! git remote | grep -q "^old-origin$"; then
        git remote rename origin old-origin
    fi

    # Set or add the new origin
    if git remote | grep -q "^origin$"; then
        git remote set-url origin https://github.com/bharathsangam/$repo.git
    else
        git remote add origin https://github.com/bharathsangam/$repo.git
    fi

    # Push everything
    git push -u origin --all
    git push origin --tags

    cd ..
done
