# based on https://docs.cloudfoundry.org/devguide/deploy-apps/ssh-apps.html#other-ssh-access

app_id=$(cf app wp-demo --guid)
api_info=$(cf curl /v2/info)

ssh_endpoint=$(echo $api_info | jq -r .app_ssh_endpoint)
key_fingerprint=$(echo $api_info | jq -r .app_ssh_host_key_fingerprint)
ssh_code=$(cf ssh-code)

ssh_host=$(echo $ssh_endpoint | cut -d : -f 1)
ssh_port=$(echo $ssh_endpoint | cut -d : -f 2)


echo "app id: $app_id"
echo "ssh endpoint: $ssh_host:$ssh_port"
echo "key fingerprint: $key_fingerprint"
echo "ssh code: $ssh_code"

echo ""
echo "rsyncing wp-content directory"
rsync -az -e "sshpass -p $ssh_code ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -p $ssh_port -l cf:$app_id/0" --progress ./wp-content $ssh_host:/mnt
